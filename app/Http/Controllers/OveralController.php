<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;

class OveralController extends Controller{

	public function index(){

		$type = self::_cherRole();

		if($type != 'error'){
			return view($type.'.index');
		}else{
			return view($type);
		}

	}

	private function _cherRole(){
		if(Auth::user()->type == '1') {
			return "admin";
		}elseif(Auth::user()->type == '2'){
			return "teacher";
		}elseif(Auth::user()->type == '3'){
			return "student";
		}else{
			return "error";
		}
	}
}
