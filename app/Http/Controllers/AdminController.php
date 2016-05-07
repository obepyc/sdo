<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use DB;
use App\Department;
use App\Cathedra;

class AdminController extends Controller{

	// Факультет

	public function getDepartment(){
		
		$data = DB::table('users')->where('type', '=', '2')->get();

		return view('admin.add_department', ['users' => $data]);

	}

	public function addDepartment(Request $request){
		
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

}
