@extends('layouts.main')

@section('title')
Главная страница - Преподаватель
@stop

@section('content')

<!-- User profile -->

<div class="container">
	<div class="row">
		<div class="user_profile">
			<h3>Профиль польователя</h3>
			<div class="profile_container">
				<div class="col-md-2">
{{-- 					<div class="user_img">
						<img src="" alt="" width="150" height="150">
					</div> --}}
				</div>
				<div class="col-md-6">
					<div class="user_info">
						<p class="user_fio">{{Auth::user()->surname." ".Auth::user()->name." ".Auth::user()->second_name}}</p>
						<ul>
							<li>Группа: <a href="">XX-YY</a></li>
							<li>Староста: <a href="">Фамилия Имя Отчество</a></li>
							<li>Куратор: <a href="">Фамилия Имя Отчество</a></li>
						</ul>

						<ul>
							<li>Телефон: <span>{{Auth::user()->phone}}</span></li>
							<li>E-mai: <span>{{Auth::user()->email}}</span></li>
						</ul>
					</div>
				</div>
				<div class="col-md-3"></div>
				<div class="clr"></div>
			</div>
		</div>
	</div>
</div>

<!-- Lessons -->

<div class="container">
	<div class="row">
		<div class="lessons">
			<h3>Список предметов</h3>
			<div id="lessons">					
				@if(count($lessons)>0)
				@foreach($lessons as $lesson)
				<div class="col-md-3">
					<div class="lesson">
						<p class="lesson_title">{{$lesson['name']}}</p>
						<div class="lesson_info">
							<p>Лабораторные:<span>{{$lesson['labs']}}</span></p>
							<p>Лекции:<span>{{$lesson['lections']}}</span></p>
						</div>
						<a href="{{route ('single.lesson', $lesson['id'])}}" class="btn btn_success">Перейти</a>
					</div>
				</div>
				@endforeach
				@endif
			</div>
		</div>
	</div>
</div>

@stop