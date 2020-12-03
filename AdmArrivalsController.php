<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Arrival;
use App\Car;
use App\Driver;
use App\Route;

class AdmArrivalsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $arrivals = Arrival::paginate(5);
		return view('adminpages.arrivals', ['arrivals' => $arrivals]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $drivers = Driver::all();
		$cars = Car::all();
		$routes = Route::all();
        return view('adminpages.ArrivalCreate', ['drivers' => $drivers, 'cars' => $cars, 'routes' => $routes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
			'car_id' => 'required|numeric',
			'driver_id' => 'required|numeric',
			'route_id' => 'required|numeric',
			'date_of_departure' => 'required|date'
		]);
		
		$arrival = new Arrival;
		$arrival->car_id = $request->car_id;
		$arrival->driver_id = $request->driver_id;
		$arrival->route_id = $request->route_id;
		$arrival->date_of_departure = $request->date_of_departure;
		if (empty($request->date_of_arrival)){
			$arrival->date_of_arrival = NULL;
		}else{
			$arrival->date_of_arrival = $request->date_of_arrival;
		}
		
		$arrival->save();
		session()->flash('message', 'Новая поездка успешно добавлена!');
		
		return redirect()->route('arrivals.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $arrival = Arrival::find($id);
		
		return view('adminpages.ArrivalShow', ['arrival' => $arrival]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
		$arrival = Arrival::find($id);
		
        $drivers = Driver::all()->where('id', '<>', $arrival->driver_id);
		$cars = Car::all()->where('id', '<>', $arrival->car_id);
		$routes = Route::all()->where('id', '<>', $arrival->route_id);
        return view('adminpages.ArrivalUpdate', ['drivers' => $drivers, 'cars' => $cars, 'routes' => $routes, 'arrival' => $arrival]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {	
        $this->validate($request, [
			'car_id' => 'required|numeric',
			'driver_id' => 'required|numeric',
			'route_id' => 'required|numeric',
			'date_of_departure' => 'required|date'
		]);
				
		$arrival = Arrival::find($id);
		
		$arrival->car_id = $request->car_id;
		$arrival->driver_id = $request->driver_id;
		$arrival->route_id = $request->route_id;
		$arrival->date_of_departure = $request->date_of_departure;
		if (empty($request->date_of_arrival)){
			$arrival->date_of_arrival = NULL;
		}else{
			$arrival->date_of_arrival = $request->date_of_arrival;
		}
		
		$arrival->save();
		session()->flash('message', 'Текущая поездка успешно обновлена!');
		
		return redirect()->route('arrivals.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $arrival = Arrival::find($id);
		$arrival->delete();
		session()->flash('message', 'Текущая поездка успешно удалена!');
		
		return redirect()->route('arrivals.index');
    }
}
