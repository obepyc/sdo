<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use DB;
use App\Http\Requests;
use App\User;

class AuthController extends Controller{

	// Авторизация

	public function getLogin(){
		return view('auth.login');
	}

	public function postLogin(Request $request){
		$this->validate($request, [
			'email' => 'required|email',
			'password' => 'required'
			]);

		if (!Auth::attempt($request->only('email', 'password'))) {

			return redirect()->back()->with('info', 'Ошибка авторизации');
		}

		return redirect('/');
	}


	public function logout(){
		Auth::logout();
		return redirect()->route('login');
	}
}
