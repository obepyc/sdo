@extends('layouts.main')

@section('title')
Добавление матреиала к предмету - {{$lesson_name}}
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
</div>

<!-- Lesson -->

<div class="container">
	<div class="row">
		<div class="user_profile add_form">
			<h3>Добавление матреиала к предмету - {{$lesson_name}}</h3>
			<div class="profile_container">
				<div class="col-md-2"></div>
				<div class="col-md-6">
					<form action="{{route ('lesson.material', $lesson_id)}}" enctype="multipart/form-data" method="post" class="add_new">

						<div class="form_group{{$errors->has('type') ? ' group_error' : ''}}">
							<p>Тип материала</p>
							<select name="type" id="" class="chosen-select" data-placeholder="Выберите тип материала" style="width:80%;">
								<option value=""></option>
								<option value="1">Лабораторная</option>
								<option value="2">Лекция</option>

							</select>
						</div>

						<div class="form_group {{$errors->has('name') ? ' group_error' : ''}}">
							<p>Название</p>
							<input type="text" name="name" value="{{old('name') ? : ''}}" placeholder="Введите название материала">
						</div>

						<div class="form_group{{$errors->has('matireal') ? ' group_error' : ''}}">
							<p>Файл рабочего плана</p>
							<input type="file" name="matireal" value="{{old('matireal') ? : ''}}">
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