<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use DB;
use App\Department;
use App\Cathedra;
use App\Group;
use App\User;
use App\Teacher;
use App\Student;

class AdminController extends Controller{

	// Факультет

	public function getDepartment(){
		
		$data = DB::table('users')->where('type', '=', '2')->get();

		return view('admin.add_department', ['users' => $data]);

	}

	public function addDepartment(Request $request){

		// Добавить проверку на уникальность

		$this->validate($request, [
			'name' => 'required',
			'short_name' => 'required',
			'decan' => 'required'
			]);

		Department::create([
			'name' => $request->input('name'),
			'short_name' => $request->input('short_name'),
			'user_id' => $request->input('decan')
			]);

		return redirect()->back()->with('info', 'Добавление прошло успено');

	}

	// Кафедра

	public function getCathedra(){
		
		$users = DB::table('users')->where('type', '=', '2')->get();

		$department = DB::table('department')->get();

		return view('admin.add_cathedra', ['users' => $users, 'departments' => $department]);

	}

	public function addCathedra(Request $request){
		
		$this->validate($request, [
			'department' => 'required',
			'name' => 'required',
			'short_name' => 'required',
			'zav_cath' => 'required'
			]);

		Cathedra::create([
			'department_id' => $request->input('department'),
			'name' => $request->input('name'),
			'short_name' => $request->input('short_name'),
			'user_id' => $request->input('zav_cath')
			]);

		return redirect()->back()->with('info', 'Добавление прошло успено');

	}

	// Группа

	public function getGroup(){

		$cathedras = DB::table('cathedra')->get();

		return view('admin.add_group', ['cathedras' => $cathedras]);

	}

	public function addGroup(Request $request){
		
		$this->validate($request, [
			'cathedra' => 'required',
			'name' => 'required',
			'year' => 'required'
			]);

		Group::create([
			'cathedra_id' => $request->input('cathedra'),
			'name' => $request->input('name'),
			'year' => $request->input('year')
			]);

		return redirect()->back()->with('info', 'Добавление прошло успено');

	}


	// Преподаватель

	public function getTeacher(){
		
		$cathedra = DB::table('cathedra')->get();

		return view('admin.add_teacher', ['cathedras' => $cathedra]);

	}

	public function addTeacher(Request $request){
		
		$this->validate($request, [
			'surname' => 'required',
			'name' => 'required',
			'second_name' => 'required',
			'email' => 'required',
			'password' => 'required',
			'phone' => 'required',
			'cathedra' => 'required',
			'position' => 'required',
			'degree' => 'required',
			]);

		$add = User::create([
			'surname' => $request->input('surname'),
			'name' => $request->input('name'),
			'second_name' => $request->input('second_name'),
			'email' => $request->input('email'),
			'password' => bcrypt($request->input('password')),
			'phone' => $request->input('phone'),
			'type' => 2,
			]);

		if($add->save()){
			Teacher::create([
				'cathedra_id' => $request->input('cathedra'),
				'user_id' => $add->id,
				'position' => $request->input('position'),
				'degree' => $request->input('degree'),
				]);
			return redirect()->back()->with('info', 'Добавление прошло успено');
		}else{
			return redirect()->back()->with('info', 'Произошла ошибка');
		}

		return redirect()->back()->with('info', 'Добавление прошло успено');

	}

	// Студент

	public function getStudent(){
		
		$groups = DB::table('groups')->get();

		return view('admin.add_student', ['groups' => $groups]);

	}

	public function addStudent(Request $request){
		
		$this->validate($request, [
			'surname' => 'required',
			'name' => 'required',
			'second_name' => 'required',
			'email' => 'required',
			'password' => 'required',
			'phone' => 'required',
			'group' => 'required'
			]);

		$add = User::create([
			'surname' => $request->input('surname'),
			'name' => $request->input('name'),
			'second_name' => $request->input('second_name'),
			'email' => $request->input('email'),
			'password' => bcrypt($request->input('password')),
			'phone' => $request->input('phone'),
			'type' => 3,
			]);

		if($add->save()){
			Student::create([
				'group_id' => $request->input('group'),
				'user_id' => $add->id,
				]);
			return redirect()->back()->with('info', 'Добавление прошло успено');
		}else{
			return redirect()->back()->with('info', 'Произошла ошибка');
		}

		return redirect()->back()->with('info', 'Добавление прошло успено');

	}

}
