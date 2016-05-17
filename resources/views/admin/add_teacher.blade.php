@extends('layouts.main')

@section('title')
Добавление преподавателя
@stop

@section('content')

<!-- User profile -->

<div class="container">
	<div class="row">
		<div class="user_profile add_form">
			<h3>Добавление преподавателя</h3>
			<div class="profile_container">
				<div class="col-md-2"></div>
				<div class="col-md-6">
					<form action="{{route ('add.teacher')}}" method="post" class="add_new">

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

						<div class="form_group{{$errors->has('department') ? ' group_error' : ''}}">
							<p>Кафедра</p>
							<select name="cathedra" id="" class="chosen-select" data-placeholder="Выберите кафедру" style="width:80%;">
								<option value=""></option>
								@if(count($cathedras) > 0)
								@foreach($cathedras as $cathedra)
								<option value="{{$cathedra->id}}" @if(old('cathedra') == $cathedra->id) selected="select" @endif>{{$cathedra->name}}</option>
								@endforeach
								@endif			
							</select>
						</div>

						<div class="form_group {{$errors->has('position') ? ' group_error' : ''}}">
							<p>Должность</p>
							<input type="text" name="position" placeholder="Должность" value="{{old('position') ? : ''}}">
						</div>

						<div class="form_group {{$errors->has('degree') ? ' group_error' : ''}}">
							<p>Ученая степень</p>
							<input type="text" name="degree" placeholder="Ученая степень" value="{{old('degree') ? : ''}}">
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
<script>
	$(".chosen-select").chosen();
</script>
@stop