<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
	public $timestamps = false;
	
    public function Reviews(){
		return $this->hasMany('App\Review', 'driver_id');
	}
	
	public function User(){
		return $this->hasOne('App\User', 'driver_id');
	}
	
	public function Arrivals(){
		return $this->hasMany('App\Arrival', 'driver_id');
	}
}
