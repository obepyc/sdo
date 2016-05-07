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

Route::group(['middleware' => ['web']], function () {

	Route::get('/logout', [
		'uses' => 'AuthController@logout',
		'as' => 'logout'
		]);	


});

Route::group(['middleware' => ['web', 'guest']], function(){

	Route::get('/login', [
		'uses' => 'AuthController@getLogin',
		'as' => 'login'
		]);

	Route::post('/login', [
		'uses' => 'AuthController@postLogin'
		]);

});

Route::group(['middleware' => ['web', 'auth']], function () {

	// Admin

	Route::group(['middleware' => ['admin']], function(){
		Route::get('/users/add', [
			'uses' => 'AdminController@addUser',
			'as' => 'users.add'
			]);
	});

	// All

	Route::get('/', [
		'uses' => 'OveralController@index',
		'as' => 'home'
		]);


});