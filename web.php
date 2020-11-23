<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Route::resource('/driver', 'DriverController');
Route::get('/driver', 'Driver1Controller@index')->name('list');
Route::get('/driver/{id}', 'Driver1Controller@show')->name('show');
Route::resource('/review', 'ReviewController');