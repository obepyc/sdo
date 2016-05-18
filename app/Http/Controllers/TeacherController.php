<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Worklesson;
use DB;

use App\Http\Requests;

class TeacherController extends Controller{
    
	public function edit_lesson($id){

		$name = DB::table('lessons')->select('name')->where('id', '=', $id)->get();

		$desc = DB::table('work_lesson')->select('description as desc')->where('id', '=', $id)->get();

		return view('lesson.edit_lesson', [
			'lesson_name' => $name[0]->name,
			'desc' => $desc[0]->desc
			]);

	}

}
