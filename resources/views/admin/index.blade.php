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
				</div>
				<div class="col-md-3"></div>
				<div class="clr"></div>
			</div>
		</div>
	</div>
</div>

@stop