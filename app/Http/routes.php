<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::group(['middleware' => 'auth'], function() {
	Route::group(['prefix' => 'mantenimiento'], function(){
		Route::resource('User', 'UserController');
		Route::resource('Co', 'CoController');
	});

	Route::resource('creditor', 'CreditorController');
	Route::resource('stationery', 'StationeryController');
	Route::resource('article', 'ArticleController');
	Route::resource('order', 'OrderController');
});


Route::auth();

Route::get('/home', 'HomeController@index');
