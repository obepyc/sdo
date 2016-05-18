<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;

class Worklesson extends Controller{

	public function lesson($id){
		
		$name = DB::table('lessons')->select('name')->where('id', '=', $id)->get();

		$desc = 'Тут должно быть описание предмета';

		$new = DB::table('work_lesson')->select('description as desc')->where('id', '=', $id)->get();

		if(!empty($new[0]->desc)) $desc = $new[0]->desc;

		$messages = DB::table('lesson_messages')->where('work_lesson_id', '=', $id)->get();

		$new = DB::table('lesson_teachers')->select('user_id')->where('work_lesson_id', '=', $id)->get();

		$teachers = [];

		for($i = 0; $i < count($new); $i++) {
			$tech = DB::table('users')->select('surname', 'name', 'second_name')->where('id', '=', $new[$i]->user_id)->get();
			$teachers[$i]['id'] =  $new[$i]->user_id;
			$teachers[$i]['surname'] =  $tech[0]->surname;
			$teachers[$i]['name'] =  $tech[0]->name;
			$teachers[$i]['second_name'] =  $tech[0]->second_name;
		}

		return view('lesson.index', [
			'lesson_id' => $id,
			'lesson_name' => $name[0]->name,
			'lesson_desc' => $desc,
			'messages' => $messages,
			'teachers' => $teachers
			]);
	}

}
