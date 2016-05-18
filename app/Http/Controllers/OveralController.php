<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;
use DB;
use Datetime;

class OveralController extends Controller{

	public function index(){

		if(Auth::user()->type == '1') {

			return view("admin.index");

		}elseif(Auth::user()->type == '2'){

			return view("teacher.index");

		}elseif(Auth::user()->type == '3'){

			$group = DB::table('groups')
			->select('id', 'name')
			->where('id', '=', function ($query) {
				$query->select(DB::raw('group_id'))
				->from('students')
				->where('user_id', '=', Auth::user()->id);
			})
			->get();

			// Вычисление семестра и списка предметов

			$old_date = DB::table('groups')
			->select('year')
			->where('id', '=', $group[0]->id)
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

			$lessons_id = DB::table('work_plan_lessons')
			->select('name as id')
			->where('wp_id', '=', function ($query) {
				$query->select(DB::raw('id'))
				->from('work_plans')
				->where('group_id', '=', function ($query) {
					$query->select(DB::raw('group_id'))
					->from('students')
					->where('user_id', '=', Auth::user()->id);
				});
			})
			->where('semester', 'LIKE', '%'.$semestr.'%')
			->get();

			$lesson = [];

			for($i = 0; $i < count($lessons_id); $i++){
				$les = DB::table('lessons')->select('id', 'name')->where('id', '=', $lessons_id[$i]->id)->get();
				$lesson[$i]['id'] = $les[0]->id;
				$lesson[$i]['name'] = $les[0]->name;
			}

			return view("student.index", ['group' => $group, 'lessons' => $lesson]);
		}else{
			return "error";
		}

	}

}
