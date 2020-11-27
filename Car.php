<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    public function Arrivals(){
		return $this->hasMany('App\Arrival', 'car_id');
	}
}
