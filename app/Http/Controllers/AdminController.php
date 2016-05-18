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
use App\Workplan;
use App\Lesson;
use App\WorkplanLesson;
use App\Worklesson;

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

		return redirect()->back()->with('success', 'Добавление прошло успено');

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

	// Рабочий план

	public function getWorkplan(){
		
		$users = DB::table('users')->where('type', '=' ,'2')->get();

		$groups = DB::table('groups')->get();

		$departments = DB::table('department')->get();

		return view('admin.add_workplan', ['users' => $users, 'groups' => $groups, 'departments' => $departments]);
	}

	public function addWorkplan(Request $request){

		$this->validate($request, [
			'group' => 'required',
			'way_code' => 'required|numeric',
			'way_name' => 'required',
			'level' => 'required',
			'department' => 'required',
			'training_form' => 'required',
			'training_period' => 'required | numeric',
			'qualification' => 'required',
			'approved' => 'required'
			]);

		$add = Workplan::create([
			'group_id' => $request->input('group'),
			'way_code' => $request->input('way_code'),
			'way_name' => $request->input('way_name'),
			'level' => $request->input('level'),
			'department_id' => $request->input('department'),
			'training_form' => $request->input('training_form'),
			'training_period' => $request->input('training_period'),
			'qualification' => $request->input('qualification'),
			'user_id' => $request->input('approved'),
			]);

		if($add->save())
			return redirect()->back()->with('success', 'Добавление прошло успено');
		else
			return redirect()->back()->with('error', 'Произошла ошибка');
	}

	// Предметы

	public function getLesson(){
		
		return view('admin.add_lesson');

	}

	public function addLesson(Request $request){

		$this->validate($request, ['name' => 'required']);

		$add = Lesson::create([
			'name' => $request->input('name')
			]);

		if($add->save()){
			return redirect()->back()->with('success', 'Добавление прошло успешно');
		}else{
			return redirect()->back()->with('error', 'Произошла ошика при добавлении');
		}

	}

	public function addLesson_group(Request $request){

		if(empty($request->file('wp')))
			return redirect()->back()->with('warning', 'Вы забыли выбрать файл');

		if($request->file('wp')->extension() == 'xls' || $request->file('wp')->extension() == 'xlsx'){


			\Excel::load($request->file('wp')->path(), function($reader) {
				$results = $reader->get();
				for($i = 0; $i < count($results); $i ++){
					$add = Lesson::create(['name' => $results[$i]['nazvanie_predmeta']]);
					if($add->save()){
						Worklesson::create(['lesson_id' => $add->id]);
					}
				}
			});
			return redirect()->back()->with('success', 'Добавление прошло успешно');
		}else{
			return redirect()->back()->with('error', 'Только xls или xlsx расширения');
		}

	}

	// Предметы рабочего плана

	public function getWP_Lesson(){

		$lessons = DB::table('lessons')->get();

		$groups = DB::table('groups')
		->select('id', 'name')
		->whereExists(function ($query) {
			$query->select(DB::raw(1))
			->from('work_plans')
			->whereRaw('work_plans.group_id = groups.id');
		})
		->get();

		return view('admin.add_WP_lessons', ['lessons' => $lessons, 'groups' => $groups])->with('info', 'Перед добавлением предметов в рабочий план, добавьте предметы в справочник!');
	}

	public function addWP_lesson(Request $request){

		$this->validate($request, [
			'group' => 'required',
			'name' => 'required',
			'credits' => 'required|numeric',
			'hour' => 'required|numeric',
			'semestr' => 'required'
			]); 

		$semestr = '';
		for($i = 0; $i < count($request->input('semestr')); $i++){
			$semestr .= $request->input('semestr')[$i].";";
		}

		$wp = DB::table('work_plans')->select('id')->where('group_id', '=', $request->input('group'))->get();

		$add = WorkplanLesson::create([
			'wp_id' => $wp[0]->id,
			'name' => $request->input('name'),
			'credits' => $request->input('credits'),
			'hour' => $request->input('hour'),
			'semester' => $semestr =  substr($semestr,0,-1)
			]);
		if($add->save()){
			return redirect()->back()->with('success', 'Добавление прошло успешно');
		}else{
			return redirect()->back()->with('error', 'Что-то пошло не так');
		}


	}

	public function addWP_lesson_group(Request $request){

		$this->validate($request, ['group' => 'required']);

		if(empty($request->file('wp')))
			return redirect()->back()->with('warning', 'Вы забыли выбрать файл');

		if($request->file('wp')->extension() == 'xls' || $request->file('wp')->extension() == 'xlsx'){
			
			\Excel::load($request->file('wp')->path(), function($reader) {
				$wp = DB::table('work_plans')->select('id')->where('group_id', '=', Request()->input('group'))->get();
				$results = $reader->get();			
				$error = false;	
				for($i = 0; $i < count($results); $i ++){
					$name = DB::table("lessons")->select('id')->where('name', '=', $results[$i]['nazvanie_predmeta'])->get();
					if(count($name) != 0){
						WorkplanLesson::create([
							'wp_id' => $wp[0]->id,
							'name' => $name[0]->id,
							'credits' => $results[$i]['kredity'],
							'hour' => $results[$i]['chasy'],
							'semester' => $results[$i]['semestr']
							]);
					}
				}
			});

			return redirect()->back()->with('success', 'Добавление прошло успешно')->with('warning', 'Могли быть добавлены не все предметы. Добавьте их вручную.');;

		}else{
			return redirect()->back()->with('error', 'Только xls или xlsx расширения');
		}

	}

	// Все пользователи

	public function allUsers(){

		$users = DB::table('users')->get();

		return view('admin.all_users', ['users' => $users]);
	}
}
