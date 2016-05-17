@extends('layouts.main')

@section('title')
Добавление нового факультета
@stop

@section('content')

@if (Session::has('success'))
<div class="alerts">
	<div class="alert alert-success">
		<h4>Успешно<span class="close"><i class="fa fa-close"></i></span></h4>
		<p>{{Session::get('success')}}</p>
	</div>
</div>
@endif

<!-- User profile -->

<div class="container">
	<div class="row all_users">
		<div class="col-md-12">
		<h3>Список всех пользователей</h3>
			<table class="users_table">
				<tr>
					<th>Фамилия</th>
					<th>Имя</th>
					<th>Отчество</th>
					<th>E-mail</th>
					<th>Телефон</th>
					<th>Тип</th>
					<th>Действия</th>
				</tr>
				@if(count($users) > 0)
				@foreach($users as $user)
				<tr>
					<td>{{$user->surname}}</td>
					<td>{{$user->name}}</td>
					<td>{{$user->second_name}}</td>
					<td>{{$user->email}}</td>
					<td>{{$user->phone}}</td>
					<td>
						@if($user->type == 1)
						Администратор
						@elseif($user->type == 2)
						Преподаватель
						@else
						Студент
						@endif
					</td>
					<td>11</td>
				</tr>
				@endforeach
				@endif	
			</table>
		</div>
	</div>
</div>

@stop