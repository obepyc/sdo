@extends('layouts.main')

@section('title')
Добавление предмета в рабочий план
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
	@if(Session::has('warning'))
	<div class="alert alert-warning">
		<h4>Внимание <span class="close"><i class="fa fa-close"></i></span></h4>
		<p>{{Session::get('warning')}}</p>
	</div>
	@endif
	@if(Session::has('info'))
	<div class="alert alert-info">
		<h4>Внимание <span class="close"><i class="fa fa-close"></i></span></h4>
		<p>{{Session::get('info')}}</p>
	</div>
	@endif
</div>

<!-- User profile -->

<div class="container">
	<div class="row">
		<div class="user_profile add_form">
			<h3>Добавление предмета в рабочий план</h3>
			<div class="profile_container">
				<div class="col-md-2"></div>
				<div class="col-md-6">
					<div id="tabs">
						<ul class="tabs">
							<li class="tab active"><a href="#one" class="active">Один предмет</a></li>
							<li class="tab"><a href="#group">Группа предметов</a></li>
						</ul>
						<div class="tabs-content">
							<div id="one">
								<form action="{{route ('add.wp.lesson')}}" method="post" class="add_new">

									<div class="form_group{{$errors->has('group') ? ' group_error' : ''}}">
										<p>Группа рабочего плана</p>
										<select name="group" id="" class="chosen-select" data-placeholder="Выберите группу" style="width:80%;">
											<option value=""></option>
											@if(count($groups) > 0)
											@foreach($groups as $group)
											<option value="{{$group->id}}" @if(old('group') == $group->id) selected="select" @endif>{{$group->name}}</option>
											@endforeach
											@endif			
										</select>
									</div>

									<div class="form_group{{$errors->has('name') ? ' group_error' : ''}}">
										<p>Название предмета</p>
										<select name="name" id="" class="chosen-select" data-placeholder="Выберите название предмета" style="width:80%;">
											<option value=""></option>
											@if(count($lessons) > 0)
											@foreach($lessons as $lesson)
											<option value="{{$lesson->id}}" @if(old('name') == $lesson->id) selected="select" @endif>{{$lesson->name}}</option>
											@endforeach
											@endif			
										</select>
									</div>

									<div class="form_group{{$errors->has('credits') ? ' group_error' : ''}}">
										<p>Кредиты</p>
										<input type="text" name="credits" placeholder="Введите количество кредитов" value="{{old('credits') ? : ''}}">
									</div>

									<div class="form_group{{$errors->has('hour') ? ' group_error' : ''}}">
										<p>Часы</p>
										<input type="text" name="hour" placeholder="Введите количество часов" value="{{old('hour') ? : ''}}">
									</div>

									<div class="form_group{{$errors->has('semestr') ? ' group_error' : ''}}">
										<p>Семетр</p>
										<select multiple name="semestr[]" id="" class="chosen-select" data-placeholder="Выберите название предмета" style="width:80%;">
											<option value=""></option>
											<option value="1">1 семестр</option>
											<option value="2">2 семестр</option>
											<option value="3">3 семестр</option>
											<option value="4">4 семестр</option>
											<option value="5">5 семестр</option>
											<option value="6">6 семестр</option>
											<option value="7">7 семестр</option>
											<option value="8">8 семестр</option>
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
							<div id="group">
								<form action="{{route ('add.wp.lesson_group')}}" enctype="multipart/form-data" method="post" class="add_new">

									<div class="form_group{{$errors->has('group') ? ' group_error' : ''}}">
										<p>Группа рабочего плана</p>
										<select name="group" id="" class="chosen-select" data-placeholder="Выберите группу" style="width:80%;">
											<option value=""></option>
											@if(count($groups) > 0)
											@foreach($groups as $group)
											<option value="{{$group->id}}" @if(old('group') == $group->id) selected="select" @endif>{{$group->name}}</option>
											@endforeach
											@endif			
										</select>
									</div>
									<div class="form_group{{$errors->has('wp') ? ' group_error' : ''}}">
										<p>Файл рабочего плана</p>
										<input type="file" name="wp" value="{{old('wp') ? : ''}}">
									</div>

									<div class="form_group">
										<input type="hidden" name="_token" value="{{Session::token()}}">
									</div>

									<div class="form_group">
										<input type="submit" value="Добавить">
									</div>
								</form>
							</div>
						</div>
					</div>
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