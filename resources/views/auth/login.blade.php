@extends('layouts.login')

@section('title')
Авторизация
@stop

@section('content')

<!-- Alert -->

@if (Session::has('info'))

<div class="alert">
	<p>{{Session::get('info')}}</p>
</div>

@endif

<!-- Login -->

<div class="login">
	<h3>Авторизация</h3>
	<form  action="{{route ('login')}}" method="post">
		<div class="form_group{{$errors->has('email') ? ' group_error' : ''}}">
			<input type="email" name="email" placeholder="Логин" value="{{old('email') ? : ''}}">
		</div>
		<div class="form_group{{$errors->has('password') ? ' group_error' : ''}}">
			<input type="password" name="password" placeholder="Пароль">
		</div>
		<input type="hidden" name="_token" value="{{Session::token()}}">
		<input type="submit" value="Войти">
	</form>
</div>