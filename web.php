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

Route::get('/', 'MainController@index')->name('welcome-page');
Route::get('/drivers', 'MainController@indexDrivers')->name('listDrivers');
Route::get('/driver/{id}/info', 'MainController@showDriver')->name('showDriverInfo');
Route::get('/routes', 'MainController@indexRoutes')->name('listRoutes');
Route::get('/route/{id}/info', 'MainController@showRoute')->name('showRouteInfo');
Route::get('/cars', 'MainController@indexCars')->name('listCars');
Route::get('/car/{id}/info', 'MainController@showCar')->name('showCarInfo');

Route::group(['middleware' => 'type'], function(){
	Route::resource('/admin/reviews', 'AdmReviewsController');
	Route::resource('/admin/cars', 'AdmCarsController');
	Route::resource('/admin/routes', 'AdmRoutesController');
	Route::resource('/admin/drivers', 'AdmDriversController');
	Route::resource('/admin/arrivals', 'AdmArrivalsController');
	Route::resource('/admin/users', 'AdmUsersController');
});

Route::resource('/review', 'ReviewController');
Auth::routes();

Route::get('/home', 'HomeController@index');
