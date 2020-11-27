<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Driver;
use App\Route;
use App\Car;
use App\Arrival;
use App\Review;

class MainController extends Controller
{
	public function index()
    {
        return view('userpages.welcome');
    }
	
    public function indexDrivers()
    {
        $drivers = Driver::paginate(5);
		return view('userpages.drivers', ['drivers' => $drivers]);
    }
	
	public function indexRoutes()
    {
        $routes = Route::paginate(5);
		return view('userpages.routes', ['routes' => $routes]);
    }
	
	public function showDriver($id)
    {
        $driver = Driver::find($id);
		$reviews = Review::where('driver_id', '=', $id)->paginate(4);
		return view('userpages.showDriver', ['driver' => $driver, 'reviews' => $reviews]);
    }
	
	public function showRoute($id)
    {
        $route = Route::find($id);
		return view('userpages.showRoute', ['route' => $route]);
    }
	
	public function indexCars()
    {
        $cars = Car::paginate(5);
		return view('userpages.cars', ['cars' => $cars]);
    }
	
	public function showCar($id)
    {
        $car = Car::find($id);
		return view('userpages.showCar', ['car' => $car]);
    }
	
	public function indexArrivals()
    {
        $arrivals = Arrival::all();
		return view('userpages.arrivals', ['arrivals' => $arrivals]);
    }
	
	public function showArrival($id)
    {
        $arrival = Arrival::find($id);
		return view('userpages.showArrival', ['arrival' => $arrival]);
    }
	
	public function admin(){
		return view('adminpages.welcome');
	}
}
