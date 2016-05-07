<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Auth;

class OveralController extends Controller{

	public function index(){

		$role = self::_cherRole();

		if($role != 'error'){
			return view($role.'.index');
		}else{
			return view($role);
		}

	}

	private function _cherRole(){
		if(Auth::user()->role == '1') {
			return "admin";
		}elseif(Auth::user()->role == '2'){
			return "teacher";
		}elseif(Auth::user()->role == '3'){
			return "student";
		}else{
			return "error";
		}
	}
}
