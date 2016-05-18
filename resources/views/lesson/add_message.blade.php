@extends('layouts.main')

@section('title')
Сообщение к предмету - {{$lesson_name}}
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
			<h3>Добавить сообщение к предмету - {{$lesson_name}}</h3>
			<div class="profile_container">
				<div class="col-md-2"></div>
				<div class="col-md-6">
					<form action="{{route ('lesson.message', $lesson_id)}}" method="post" class="add_new">

						<div class="form_group {{$errors->has('title') ? ' group_error' : ''}}">
							<p>Заголовок</p>
							<input type="text" name="title" placeholder="Введите заголовок сообщения">
						</div>

						<div class="form_group {{$errors->has('mess') ? ' group_error' : ''}}">
							<p>Текст сообщения</p>
							<textarea name="mess" id="editor1" cols="30" rows="10">{{old('mess') ? : ''}}</textarea>
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
<script src="//cdn.ckeditor.com/4.5.7/standard/ckeditor.js"></script>
<script>
	var editor = CKEDITOR.replace( 'editor1' );
</script>
@stop