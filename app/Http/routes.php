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

	Route::get('/test', function(){
		
		$old_date = DB::table('groups')
		->select('year')
		->where('id', '=', '1')
		->get();
		$start = $old_date[0]->year.'-09-01';
		$start_time = new Datetime($start);
		$date = new Datetime();
		$dif = $date->diff($start_time);

		$semestr = 0;

		if(($dif->format('%y') == '3') && ($dif->format('%m') > '5')){
			$semestr = 8;
		}elseif(($dif->format('%y') == '3') && ($dif->format('%m') < '5')){
			$semestr = 7;
		}elseif(($dif->format('%y') == '2') && ($dif->format('%m') > '5')){
			$semestr = 6;
		}elseif(($dif->format('%y') == '2') && ($dif->format('%m') < '5')){
			$semestr = 5;
		}elseif(($dif->format('%y') == '1') && ($dif->format('%m') > '5')){
			$semestr = 4;
		}elseif(($dif->format('%y') == '1') && ($dif->format('%m') < '5')){
			$semestr = 3;
		}elseif(($dif->format('%y') == '0') && ($dif->format('%m') > '5')){
			$semestr = 2;
		}elseif(($dif->format('%y') == '0') && ($dif->format('%m') < '5') && ($dif->format('%m') != '0')){
			$semestr = 1;
		}

		if($date < $start_time){
			$semestr = 0;
		}

		$lessons = DB::table('work_plan_lessons')
		->select('name')
		->where('wp_id', '=', '1')
		->where('semester', 'LIKE', '%'.$semestr.'%')
		->get();

		dd($lessons);

	});


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

		// Рабочи план

		Route::get('/add/workplan',[
			'uses' => 'AdminController@getWorkplan',
			'as' => 'add.workplan'
			]);

		Route::post('/add/workplan',[
			'uses' => 'AdminController@addWorkplan'
			]);

		// Предметы

		Route::get('/add/lesson', [
			'uses' => 'AdminController@getLesson',
			'as' => 'add.lesson'
			]);

		Route::post('/add/lesson', [
			'uses' => 'AdminController@addLesson'
			]);

		Route::post('/add/lesson_group', [
			'uses' => 'AdminController@addLesson_group',
			'as' => 'add.lesson_group'
			]);

		Route::get('/add/workplan/lesson', [
			'uses' => 'AdminController@getWP_lesson',
			'as' => 'add.wp.lesson'
			]);

		Route::post('/add/workplan/lesson', [
			'uses' => 'AdminController@addWP_lesson',
			'as' => 'add.wp.lesson'
			]);

		Route::post('/add/workplan/lesson_group', [
			'uses' => 'AdminController@addWP_lesson_group',
			'as' => 'add.wp.lesson_group'
			]);

		// Список пользователей

		Route::get('/users', [
			'uses' => 'AdminController@allUsers',
			'as' => 'all.users'
			]);

	});

	// Преподаватель

Route::group(['middleware' => ['teacher']], function(){

	Route::get('/lesson/{id}/edit', [
		'uses' => 'TeacherController@edit_lesson',
		'as' => 'edit.lesson'
		]);

	Route::post('/lesson/{id}/edit', [
		'uses' => 'TeacherController@post_edit_lesson',
		]);

	Route::get('/lesson/{id}/message',[
		'uses' => 'TeacherController@getMessage',
		'as' => 'lesson.message'
		]);

	Route::post('/lesson/{id}/message',[
		'uses' => 'TeacherController@addMessage'
		]);

	Route::get('/lesson/{id}/material', [
		'uses' => 'TeacherController@getMaterial',
		'as' => 'lesson.material'
		]);

	Route::post('/lesson/{id}/material', [
		'uses' => 'TeacherController@addMaterial'
		]);

});

	// Все пользователи

Route::get('/', [
	'uses' => 'OveralController@index',
	'as' => 'home'
	]);

Route::get('/lesson/{id}', [
	'uses' => 'Worklesson@lesson',
	'as' => 'single.lesson'
	]);

});