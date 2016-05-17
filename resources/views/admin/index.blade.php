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
				<div class="col-md-12">

					<div id="tabs">
						<!-- Вкладки выполнены в виде списка с якорными ссылками -->
						<ul class="tabs">
							<li class="tab active"><a href="#users" class="active">Пользовательские</a></li>
							<li class="tab"><a href="#groups">Групповые</a></li>
							<li class="tab"><a href="#else">Прочие</a></li>
						</ul>
						<!-- Содержимое каждой вкладки имеет id в соответствии с якорной ссылкой -->
						<div class="tabs-content">
							<div id="users">
								<a href="{{route('add.teacher')}}" class="btn btn_success"><i class="fa fa-plus"></i>Добавить преподавателя</a>
								<a href="{{route('add.student')}}" class="btn btn_success"><i class="fa fa-plus"></i>Добавить студента</a>
							</div>
							<div id="groups">
								<a href="{{route('add.department')}}" class="btn btn_success"><i class="fa fa-plus"></i>Добавить факультет</a>
								<a href="{{route('add.cathedra')}}" class="btn btn_success"><i class="fa fa-plus"></i>Добавить кафедру</a>
								<a href="{{route('add.group')}}" class="btn btn_success"><i class="fa fa-plus"></i>Добавить группу</a>
							</div>
							<div id="else">
								<a href="{{route('add.workplan')}}" class="btn btn_success"><i class="fa fa-plus"></i>Добавить рабочий палн</a>
								<a href="{{route('add.wp.lesson')}}" class="btn btn_success"><i class="fa fa-plus"></i>Добавить предмет в рабочий план</a>
								<a href="{{route('add.lesson')}}" class="btn btn_success"><i class="fa fa-plus"></i>Добавить предмет в справочник</a>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-3"></div>
				<div class="clr"></div>
			</div>
		</div>
	</div>
</div>

@stop