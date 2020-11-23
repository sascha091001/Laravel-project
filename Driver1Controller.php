<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Driver;

class Driver1Controller extends Controller
{
    public function index()
    {
        $drivers = Driver::all();
		return view('drivers.drivers', ['drivers' => $drivers]);
    }
	
	public function show($id)
    {
        $driver = Driver::find($id);
		return view('drivers.show', ['driver' => $driver]);
    }
}
