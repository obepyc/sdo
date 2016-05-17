@extends('layouts.main')

@section('title')
Добавление нового рабочего плана
@stop

@section('content')

<!-- Allerts -->

<div class="alerts">
	@if(Session::has('error'))
	<div class="alert alert-error">
		<h4>Ошибка <span class="close"><i class="fa fa-close"></i></span></h4>
		<p>{{Session::get('error')}}</p>
	</div>
	@endif
	@if(Session::has('success'))
	<div class="alert alert-success">
		<h4>Успех <span class="close"><i class="fa fa-close"></i></span></h4>
		<p>{{Session::get('success')}}</p>
	</div>
	@endif
</div>


<!-- User profile -->

<div class="container">
	<div class="row">
		<div class="user_profile add_form">
			<h3>Добавление нового рабочего плана</h3>
			<div class="profile_container">
				<div class="col-md-2"></div>
				<div class="col-md-6">
					<form action="{{route ('add.workplan')}}" method="post" class="add_new">

						<div class="form_group{{$errors->has('group') ? ' group_error' : ''}}">
							<p>Группа</p>
							<select name="group" id="" class="chosen-select" data-placeholder="Выберите группу">
								<option value=""></option>
								@if(count($groups) > 0)
								@foreach($groups as $group)
								<option value="{{$group->id}}" @if(old('group') == $group->id) selected="select" @endif>{{$group->name}}</option>
								@endforeach
								@endif			
							</select>
						</div>

						<div class="form_group {{$errors->has('way_code') ? ' group_error' : ''}}">
							<p>Направление подготовки (код)</p>
							<input type="text" name="way_code" placeholder="Введите код напреавления подготовки" value="{{old('way_code') ? : ''}}">
						</div>

						<div class="form_group {{$errors->has('way_name') ? ' group_error' : ''}}">
							<p>Направление подготовки (название)</p>
							<input type="text" name="way_name" placeholder="Введите название напреавления подготовки" value="{{old('way_name') ? : ''}}">
						</div>

						<div class="form_group {{$errors->has('level') ? ' group_error' : ''}}">
							<p>Образовательно-квалификационный уровень</p>
							<input type="text" name="level" placeholder="Введите уровень подготовки" value="{{old('level') ? : ''}}">
						</div>

						<div class="form_group{{$errors->has('department') ? ' group_error' : ''}}">
							<p>Факультет</p>
							<select name="department" id="" class="chosen-select" data-placeholder="Выберите факультет">
								<option value=""></option>
								@if(count($departments) > 0)
								@foreach($departments as $department)
								<option value="{{$department->id}}" @if(old('department') == $department->id) selected="select" @endif>{{$department->name}}</option>
								@endforeach
								@endif			
							</select>
						</div>

						<div class="form_group {{$errors->has('training_form') ? ' group_error' : ''}}">
							<p>Форма обучения</p>
							<input type="text" name="training_form" placeholder="Введите форму обучения" value="{{old('training_form') ? : ''}}">
						</div>

						<div class="form_group {{$errors->has('training_period') ? ' group_error' : ''}}">
							<p>Термин обучения</p>
							<input type="text" name="training_period" placeholder="Введите термин обучения" value="{{old('training_period') ? : ''}}">
						</div>
						
						<div class="form_group {{$errors->has('qualification') ? ' group_error' : ''}}">
							<p>Квалификация</p>
							<input type="text" name="qualification" placeholder="Введите квалификацию" value="{{old('qualification') ? : ''}}">
						</div>

						<div class="form_group{{$errors->has('approved') ? ' group_error' : ''}}">
							<p>Утвердил</p>
							<select name="approved" id="" class="chosen-select" data-placeholder="Выберите утвердившего" style="width:350px; height:40px;">
								<option value=""></option>
								@if(count($users) > 0)
								@foreach($users as $user)
								<option value="{{$user->id}}" @if(old('approved') == $user->id) selected="select" @endif>{{$user->surname.' '.$user->name.' '.$user->second_name}}</option>
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

<script>
	$(".chosen-select").chosen();
</script>
@stop