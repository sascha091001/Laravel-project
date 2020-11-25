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
Route::get('/drivers', 'Driver1Controller@index')->name('list');
Route::get('/driver/{id}/info', 'Driver1Controller@show')->name('show');
Route::resource('/review', 'ReviewController');
Auth::routes();

Route::get('/home', 'HomeController@index');
