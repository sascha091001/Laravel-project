<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Driver extends Model
{
    public function Reviews(){
		return $this->hasMany('App\Review', 'driver_id');
	}
}
