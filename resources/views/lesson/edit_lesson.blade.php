@extends('layouts.main')

@section('title')
Редактирование предмета - {{$lesson_name}}
@stop

@section('content')

<!-- Lesson -->

<div class="container">
	<div class="row">
		<div class="user_profile add_form">
		<h3>Редактирование предмета - {{$lesson_name}}</h3>
			<div class="profile_container">
				<div class="col-md-2"></div>
				<div class="col-md-6">
					<form action="{{route ('add.cathedra')}}" method="post" class="add_new">

						<div class="form_group {{$errors->has('desc') ? ' group_error' : ''}}">
							<p>Описание предмета</p>
							<textarea name="desc" id="" cols="30" rows="10">{{$desc}}{{old('short_name') ? : ''}}</textarea>
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