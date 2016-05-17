@extends('layouts.main')

@section('title')
Добавление предмета
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

<!-- User profile -->

<div class="container">
	<div class="row">
		<div class="user_profile add_form">
			<h3>Добавление предмета</h3>
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
								<form action="{{route ('add.lesson')}}" method="post" class="add_new">
									<div class="form_group{{$errors->has('name') ? ' group_error' : ''}}">
										<p>Название</p>
										<input type="text" name="name" placeholder="Название" value="{{old('name') ? : ''}}">
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
								<form action="{{route ('add.lesson_group')}}" enctype="multipart/form-data" method="post" class="add_new">
									<div class="form_group{{$errors->has('wp') ? ' group_error' : ''}}">
										<p>Название</p>
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