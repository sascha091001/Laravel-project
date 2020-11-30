<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Car;

class AdmCarsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Car::paginate(5);
		return view('adminpages.cars', ['cars' => $cars]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminpages.CarCreate');
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
			'number' => 'required|max:6|unique:cars',
			'model' => 'required|max:20',
			'condition' => 'required|max:15',
			'mileage' => 'required|numeric|max:300000',
			'tonnage' => 'required|numeric|max:10',
			'img' => 'required|max:255'
		]);
		
		$car = new Car;
		$car->number = $request->number;
		$car->model = $request->model;
		$car->condition = $request->condition;
		$car->mileage = $request->mileage;
		$car->tonnage = $request->tonnage;
		$car->img = $request->img;
		
		$car->save();
		
		return redirect()->route('cars.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $car = Car::find($id);
		return view('adminpages.CarShow', ['car' => $car]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $car = Car::find($id);
		
		return view('adminpages.CarUpdate', ['car' => $car]);
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
		$car = Car::find($id);
		
        $this->validate($request, [
			'number' => 'required|max:6',
			'model' => 'required|max:20',
			'condition' => 'required|max:15',
			'mileage' => 'required|numeric|max:300000',
			'tonnage' => 'required|numeric|max:10',
			'img' => 'required|max:255'
		]);

		$car->number = $request->number;
		$car->model = $request->model;
		$car->condition = $request->condition;
		$car->mileage = $request->mileage;
		$car->tonnage = $request->tonnage;
		$car->img = $request->img;
		
		$car->save();
		
		return redirect()->route('cars.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $car = Car::find($id);
		$car->delete();
		
		return redirect()->route('cars.index');
    }
}
