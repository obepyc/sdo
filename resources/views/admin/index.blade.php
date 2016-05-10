@extends('layouts.main')

@section('title')
Главная страница - Администратор
@stop

@section('content')

<!-- User profile -->

<div class="container">
	<div class="row">
		<div class="user_profile">
			<h3>Профиль администратора</h3>
			<div class="profile_container">
				<div class="col-md-6">
					<a href="{{route('add.department')}}" class="btn btn_primary">Добавить факультет</a>
					<a href="{{route('add.cathedra')}}" class="btn btn_primary">Добавить кафедру</a>
					<a href="{{route('add.group')}}" class="btn btn_primary">Добавить группу</a>
					<a href="{{route('add.teacher')}}" class="btn btn_primary">Добавить преподавателя</a>
					<a href="{{route('add.student')}}" class="btn btn_primary">Добавить студента</a>
				</div>
				<div class="col-md-3"></div>
				<div class="clr"></div>
			</div>
		</div>
	</div>
</div>

@stop