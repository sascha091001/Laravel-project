<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Driver;
use App\Route;
use App\Car;

class MainController extends Controller
{
    public function indexDrivers()
    {
        $drivers = Driver::all();
		return view('drivers.drivers', ['drivers' => $drivers]);
    }
	
	public function indexRoutes()
    {
        $routes = Route::all();
		return view('drivers.routes', ['routes' => $routes]);
    }
	
	public function showDriver($id)
    {
        $driver = Driver::find($id);
		return view('drivers.showDriver', ['driver' => $driver]);
    }
	
	public function showRoute($id)
    {
        $route = Route::find($id);
		return view('drivers.showRoute', ['route' => $route]);
    }
	
	public function indexCars()
    {
        $cars = Car::all();
		return view('drivers.cars', ['cars' => $cars]);
    }
	
	public function showCar($id)
    {
        $car = Car::find($id);
		return view('drivers.showCar', ['car' => $car]);
    }
}
