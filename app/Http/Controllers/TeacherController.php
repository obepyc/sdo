<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use Auth;

use App\Lessonmessage;
use App\Lessonmatireals;


class TeacherController extends Controller{

	public function edit_lesson($id){

		self::_user_validate($id);

		$name = DB::table('lessons')->select('name')->where('id', '=', $id)->get();

		$desc = DB::table('work_lesson')->select('description as desc')->where('id', '=', $id)->get();

		return view('lesson.edit_lesson', [
			'lesson_id' => $id,
			'lesson_name' => $name[0]->name,
			'desc' => $desc[0]->desc
			]);

	}

	public function post_edit_lesson($id, Request $request){

		$this->validate($request, ['desc' => 'required']);

		$update = DB::table('work_lesson')
		->where('id', '=', $id)
		->update(['description' => $request->input('desc')]);

		if($update){
			return redirect()->route('single.lesson', $id)->with('success', 'Добавление прошло успено');
		}else{
			return redirect()->back()->with('error', 'Произошла ошибка!');
		}

	}

	public function getMessage($id){

		self::_user_validate($id);

		$name = DB::table('lessons')->select('name')->where('id', '=', $id)->get();

		return view('lesson.add_message', [
			'lesson_id' => $id,
			'lesson_name' => $name[0]->name
			]);

	}

	public function addMessage($id, Request $request){

		$this->validate($request, [
			'title' => 'required',
			'mess' => 'required'
			]);

		$add = Lessonmessage::create([
			'work_lesson_id' => $id,
			'user_id' => Auth::user()->id,
			'title' => $request->input('title'),
			'text' => $request->input('mess')
			]);

		if($add->save()){
			return redirect()->route('single.lesson', $id)->with('success', 'Сообщение добавлено');
		}else{
			return redirect()->back()->with('error', 'Произошла ошибка!');
		}

	}

	public function getMaterial($id){

		self::_user_validate($id);

		$name = DB::table('lessons')->select('name')->where('id', '=', $id)->get();

		return view('lesson.add_material', [
			'lesson_id' => $id,
			'lesson_name' => $name[0]->name
			]);

	}

	public function addMaterial($id, Request $request){

		$this->validate($request, [
			'type' => 'required',
			'name' => 'required'
			]);

		$folder = 'uploads'.DIRECTORY_SEPARATOR.'lessons'.DIRECTORY_SEPARATOR;

		$extension = $request->file('matireal')->extension();

		if(!is_dir($folder.$id)){
			mkdir($folder.$id);
		}

		$name = self::_translit($request->input('name')).'_'.rand(11111,99999).'_.'.$extension;

		$request->file('matireal')->move($folder.$id, $name);

		$url = $folder.$id.DIRECTORY_SEPARATOR.$name;

		$add = Lessonmatireals::create([
			'work_lesson_id' => $id,
			'user_id' => Auth::user()->id,
			'type' => $request->input('type'),
			'name' => $request->input('name'),
			'url' => $url
			]);

		if($add->save()){
			return redirect()->route('single.lesson', $id)->with('success', 'Материал добавлен');
		}else{
			return redirect()->back()->with('error', 'Произошла ошибка!');
		}

	}


	private function _user_validate($id){

		$user_id = DB::table('lesson_teachers')->where('work_lesson_id', '=', $id)->where('user_id', '=', Auth::user()->id)->get();

		if(count($user_id) == 0) {
			return redirect()->back();
		}
	}

	private function _translit($name) {
		$name = (string) $name; // преобразуем в строковое значение
		$name = strip_tags($name); // убираем HTML-теги
		$name = str_replace(array("\n", "\r"), " ", $name); // убираем перевод каретки
		$name = preg_replace("/\s+/", ' ', $name); // удаляем повторяющие пробелы
		$name = trim($name); // убираем пробелы в начале и конце строки
		$name = function_exists('mb_strtolower') ? mb_strtolower($name) : strtolower($name); // переводим строку в нижний регистр (иногда надо задать локаль)
		$name = strtr($name, array('а'=>'a','б'=>'b','в'=>'v','г'=>'g','д'=>'d','е'=>'e','ё'=>'e','ж'=>'j','з'=>'z','и'=>'i','й'=>'y','к'=>'k','л'=>'l','м'=>'m','н'=>'n','о'=>'o','п'=>'p','р'=>'r','с'=>'s','т'=>'t','у'=>'u','ф'=>'f','х'=>'h','ц'=>'c','ч'=>'ch','ш'=>'sh','щ'=>'shch','ы'=>'y','э'=>'e','ю'=>'yu','я'=>'ya','ъ'=>'','ь'=>'', ' '=>''));
		$name = preg_replace("/[^0-9a-z-_ ]/i", "", $name); // очищаем строку от недопустимых символов
		$name = str_replace(" ", "-", $name); // заменяем пробелы знаком минус
		return $name; // возвращаем результат
	}


}
