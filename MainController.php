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
        //$a = url()->current();
        //$last = explode("/", $a, 4);
        //dd($last);

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
		$arrivals = $driver->arrivals->sortByDesc('date_of_departure')->take(5);
		$reviews = Review::where('driver_id', '=', $id)->paginate(4);
		return view('userpages.showDriver', ['driver' => $driver, 'reviews' => $reviews, 'arrivals' => $arrivals]);
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
}
