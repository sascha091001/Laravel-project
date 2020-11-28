<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
	public $timestamps = false;
	
    public function Arrivals(){
		return $this->hasMany('App\Arrival', 'car_id');
	}
}
