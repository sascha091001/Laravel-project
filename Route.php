<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Route extends Model
{
    public function Arrivals(){
		return $this->hasMany('App\Arrival', 'route_id');
	}
}
