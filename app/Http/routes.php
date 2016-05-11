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


	Route::get('/excel', function(){
		Excel::load('uploads/wp.xlsx', function($reader) {
			$results = $reader->get();
			echo '<table>';
			for($i = 0; $i < count($results); $i ++){
				echo "<tr>";
				echo "<td>".$results[$i]['nazvanie_predmeta'].'</td>';
				echo "<td>".$results[$i]['kredity'].'</td>';
				echo "<td>".$results[$i]['chasy'].'</td>';
			}
			echo '</table>';

			dd($results);
		});
	});

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

	// Администратор

	Route::group(['middleware' => ['admin']], function(){

		//Факультет

		Route::get('/add/department', [
			'uses' => 'AdminController@getDepartment',
			'as' => 'add.department'
			]);

		Route::post('/add/department', [
			'uses' => 'AdminController@addDepartment'
			]);

		// Кафедра

		Route::get('/add/cathedra', [
			'uses' => 'AdminController@getCathedra',
			'as' => 'add.cathedra'
			]);

		Route::post('/add/cathedra', [
			'uses' => 'AdminController@addCathedra'
			]);

		// Группа

		Route::get('/add/group', [
			'uses' => 'AdminController@getGroup',
			'as' => 'add.group'
			]);

		Route::post('/add/group', [
			'uses' => 'AdminController@addGroup'
			]);

		// Преподаватель

		Route::get('/add/teacher', [
			'uses' => 'AdminController@getTeacher',
			'as' => 'add.teacher'
			]);

		Route::post('/add/teacher', [
			'uses' => 'AdminController@addTeacher'
			]);

		// Студент

		Route::get('/add/student', [
			'uses' => 'AdminController@getStudent',
			'as' => 'add.student'
			]);

		Route::post('/add/student', [
			'uses' => 'AdminController@addStudent'
			]);

	});

	// Все пользователи

Route::get('/', [
	'uses' => 'OveralController@index',
	'as' => 'home'
	]);


});