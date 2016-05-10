@extends('layouts.main')

@section('title')
Добавление студента
@stop

@section('content')

<!-- User profile -->

<div class="container">
	<div class="row">
		<div class="user_profile add_form">
			<h3>Добавление студента</h3>
			<div class="profile_container">
				<div class="col-md-2"></div>
				<div class="col-md-6">
					<form action="{{route ('add.student')}}" method="post" class="add_new">

						<div class="form_group{{$errors->has('surname') ? ' group_error' : ''}}">
							<p>Фамилия</p>
							<input type="text" name="surname" placeholder="Фамилия" value="{{old('surname') ? : ''}}">
						</div>

						<div class="form_group{{$errors->has('name') ? ' group_error' : ''}}">
							<p>Имя</p>
							<input type="text" name="name" placeholder="Имя" value="{{old('name') ? : ''}}">
						</div>

						<div class="form_group{{$errors->has('second_name') ? ' group_error' : ''}}">
							<p>Отчество</p>
							<input type="text" name="second_name" placeholder="Отчество" value="{{old('second_name') ? : ''}}">
						</div>

						<div class="form_group {{$errors->has('email') ? ' group_error' : ''}}">
							<p>Электронный адрес</p>
							<input type="email" name="email" placeholder="E-mail" value="{{old('email') ? : ''}}">
						</div>

						<div class="form_group {{$errors->has('password') ? ' group_error' : ''}}">
							<p>Пароль</p>
							<input type="password" name="password" placeholder="Пароль">
						</div>

						<div class="form_group {{$errors->has('phone') ? ' group_error' : ''}}">
							<p>Номер телефона</p>
							<input type="text" name="phone" placeholder="Пароль" value="{{old('phone') ? : ''}}">
						</div>

						<div class="form_group{{$errors->has('group') ? ' group_error' : ''}}">
							<p>Группа</p>
							<select name="group" id="" class="chosen-select" data-placeholder="Выберите группу" style="width:80%;">
								<option value=""></option>
								@if(count($groups) > 0)
								@foreach($groups as $group)
								<option value="{{$group->id}}" @if(old('group') == $group->id) selected="select" @endif>{{$group->name}}</option>
								@endforeach
								@endif			
							</select>
						</div>

						<div class="form_group">
							<input type="hidden" name="_token" value="{{Session::token()}}">
						</div>

						<div class="form_group">
							<input type="submit" value="Добавить">
						</div>
					</form>
				</div>
				<div class="clr"></div>
			</div>
		</div>
	</div>
</div>

@stop

@section('scripts')
<script src="/assets/js/chosen.jquery.min.js"></script>
@stop