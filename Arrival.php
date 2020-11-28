<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Arrival extends Model
{
	public $timestamps = false;
	
    public function Car(){
		return $this->belongsTo('App\Car', 'car_id');
	}
	
	public function Driver(){
		return $this->belongsTo('App\Driver', 'driver_id');
	}
	
	public function Route(){
		return $this->belongsTo('App\Route', 'route_id');
	}
}
