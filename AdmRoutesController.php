<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Route;

class AdmRoutesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $routes = Route::paginate(5);
        return view('adminpages.routes', ['routes' => $routes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('adminpages.RouteCreate');
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
			'route_from' => 'required|max:30',
			'route_where' => 'required|max:30',
			'full_route' => 'required|max:255',
			'distance' => 'required|numeric|max:10000',
		]);
		
		$route = new Route;
		
		$route->route_from = $request->route_from;
		$route->route_where = $request->route_where;
		$route->full_route = $request->full_route;
		$route->distance = $request->distance;
		
		$route->save();
		session()->flash('message', 'Новый маршрут успешно обновлён!');
		
		return redirect()->route('routes.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $route = Route::find($id);
		return view('adminpages.RouteShow', ['route' => $route]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $route = Route::find($id);
		
		return view('adminpages.RouteUpdate', ['route' => $route]);
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
		$route = Route::find($id);
		
        $this->validate($request, [
			'route_from' => 'required|max:30',
			'route_where' => 'required|max:30',
			'full_route' => 'required|max:255',
			'distance' => 'required|numeric|max:10000',
		]);
		
		$route->route_from = $request->route_from;
		$route->route_where = $request->route_where;
		$route->full_route = $request->full_route;
		$route->distance = $request->distance;
		
		$route->save();
		session()->flash('message', 'Текущий маршрут успешно обновлён!');
		
		return redirect()->route('routes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $route = Route::find($id);
		
		$route->arrivals()->delete();
		$route->delete();
		session()->flash('message', 'Текущий маршрут успешно удалён!');
		
		return redirect()->route('routes.index');
    }
}
