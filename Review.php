<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    public function Driver(){
		return $this->belongsTo('App\Driver', 'driver_id');
	}
	
	public function User(){
		return $this->belongsTo('App\User', 'user_id');
	}
}
