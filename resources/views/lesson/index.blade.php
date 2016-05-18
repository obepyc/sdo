@extends('layouts.main')

@section('title')
Страница предмета - {{$lesson_name}}
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
		<div class="col-md-9">
			<div class="single_lesson">
				<h3>{{$lesson_name}}</h3>
				<div class="col-md-12">
					<p>Преподаватели:</p>
					<ul class="lesson_teacher">
						@if(count($teachers)>0)
						@foreach($teachers as $teacher)
						<li><a href="#">{{$teacher['surname'].' '.$teacher['name'].' '.$teacher['second_name']}}</a></li>
						@endforeach
						@endif
					</ul>
				</div>
				<div class="col-md-12">
					<div class="lesson_desc">
						<h4>Описание предмета</h4>
						<p>{!!$lesson_desc!!}</p>
					</div>
					@if(Auth::user()->type == '2')
					@foreach($teachers as $teacher)
					@if(Auth::user()->id == $teacher['id'])
					<div class="func">
						<a href="{{route ('edit.lesson', $lesson_id)}}" class="btn btn_primary">Редактировать описание</a>
						{{-- <a href="" class="btn btn_error">Отписаться от предмета</a> --}}
					</div>
					@endif
					@endforeach
					@endif
				</div>
				<div class="clr"></div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="single_lesson mess">
				<h4>Важные оповещения</h4>
				<div class="messages">
					@if(count($messages)>0)
					@foreach($messages as $message)
					<div class="message">
						<p class="title">{{$message->title}}</p>
						<div class="text">{!!$message->text!!}</div>
						<p class="info"><span>{{$message->date}}</span></p>
					</div>
					@endforeach
					@endif
				</div>

			</div>
			@if(Auth::user()->type == '2')
			@foreach($teachers as $teacher)
			@if(Auth::user()->id == $teacher['id'])
			<a href="{{route ('lesson.message', $lesson_id)}}" class="btn btn_primary">Написать сообщение</a>
			@endif
			@endforeach
			@endif
		</div>
	</div>
</div>


<!-- Lesson matireal -->

<div class="container">
	<div class="row">
		<div class="col-md-6">
			<div class="lesson_matireal">
				<h4>Лекции</h4>
				<table>
					<tr>
						<th>Название</th>
						<th>Дата</th>
						<th>Действие</th>
					</tr>
					@if(count($lections)>0)
					@foreach($lections as $lection)
					<tr>
						<td>{{$lection->name}}</td>
						<td>{{$lection->date}}</td>
						<td>
							<a href="{{$lection->url}}" target="_blank" class="btn_success"><i class="fa fa-download"></i></a>
							@if(Auth::user()->type == '2')
							@foreach($teachers as $teacher)
							@if(Auth::user()->id == $teacher['id'])
							<a href="" class="btn_primary"><i class="fa fa-pencil"></i></a>
							<a href="" class="btn_error"><i class="fa fa-trash"></i></a>
							@endif
							@endforeach
							@endif
						</td>
					</tr>
					@endforeach
					@endif
				</table>
			</div>
		</div>

		<!--  -->

		<div class="col-md-6">
			<div class="lesson_matireal">
				<h4>Лабораторные</h4>
				<table>
					<tr>
						<th>Название</th>
						<th>Дата</th>
						<th>Действие</th>
					</tr>
					@if(count($labs)>0)
					@foreach($labs as $lab)
					<tr>
						<td>{{$lab->name}}</td>
						<td>{{$lab->date}}</td>
						<td>
							<a href="{{$lab->url}}" target="_blank" class="btn_success"><i class="fa fa-download"></i></a>
							@if(Auth::user()->type == '2')
							@foreach($teachers as $teacher)
							@if(Auth::user()->id == $teacher['id'])
							<a href="" class="btn_primary"><i class="fa fa-pencil"></i></a>
							<a href="" class="btn_error"><i class="fa fa-trash"></i></a>
							@endif
							@endforeach
							@endif
						</td>
					</tr>
					@endforeach
					@endif

				</table>
			</div>
		</div>
		@if(Auth::user()->type == '2')
		@foreach($teachers as $teacher)
		@if(Auth::user()->id == $teacher['id'])
		<a href="{{route ('lesson.material', $lesson_id)}}" class="btn btn_success">Добавить материал</a>
		@endif
		@endforeach
		@endif
		
	</div>
</div>
@stop