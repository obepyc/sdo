<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;

class AuthController extends Controller{
    
	public function getLogin(){
		return view('auth.login');
	}

	public function logout(){
		Auth::logout();
		return redirect()->route('login');
	}

	public function postLogin(Request $request){
		$this->validate($request, [
			'email' => 'required',
			'password' => 'required'
			]);

		if (!Auth::attempt($request->only(['email', 'password']))) {
			return redirect()->back();
		}

		return redirect('/');
	}

}