@extends('layouts.login')

@section('title')
Авторизация
@stop

@section('content')

<!-- Alert -->

@if (Session::has('error'))
<div class="alerts">
	<div class="alert alert-error">
		<h4>Ошибка <span class="close"><i class="fa fa-close"></i></span></h4>
		<p>{{Session::get('error')}}</p>
	</div>
</div>
@endif

<!-- Login -->

<div class="login">
	<h3>Авторизация</h3>
	<form  action="{{route ('login')}}" method="post">
		<div class="form_group{{$errors->has('email') ? ' group_error' : ''}}">
			<i class="fa fa-user"></i>
			<input type="email" name="email" required placeholder="Логин" value="{{old('email') ? : ''}}">
		</div>
		<div class="form_group{{$errors->has('password') ? ' group_error' : ''}}">
			<i class="fa fa-key"></i>
			<input type="password" name="password" required placeholder="Пароль">
		</div>
		<input type="hidden" name="_token" value="{{Session::token()}}">
		<input type="submit" value="Войти">
	</form>
</div>