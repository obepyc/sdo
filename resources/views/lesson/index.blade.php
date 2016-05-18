@extends('layouts.main')

@section('title')
Страница предмета - {{$lesson_name}}
@stop

@section('content')

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
						<p>{{$lesson_desc}}</p>
					</div>
					@if(Auth::user()->type == '2')
					<div class="func">
						<a href="{{route ('edit.lesson', $lesson_id)}}" class="btn btn_primary">Добавить описание</a>
						<a href="" class="btn btn_error">Отписаться от предмета</a>
					</div>
					@endif
				</div>
				<div class="clr"></div>
			</div>
		</div>
		<div class="col-md-3">
			<div class="single_lesson">
				<h4>Важные оповещения</h4>
			</div>
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
						<th>№</th>
						<th>Название</th>
						<th>Дата</th>
						<th>Размер</th>
						<th>Действие</th>
					</tr>
					<tr>
						<td>1</td>
						<td>Название лабораторной работы</td>
						<td>25.02.2016</td>
						<td>256Kb</td>
						<td>
							<a href="" class="btn_success"><i class="fa fa-download"></i></a>
							<a href="" class="btn_primary"><i class="fa fa-pencil"></i></a>
							<a href="" class="btn_error"><i class="fa fa-trash"></i></a>
						</td>
					</tr>
					<tr>
						<td>1</td>
						<td>Название лабораторной работы</td>
						<td>25.02.2016</td>
						<td>256Kb</td>
						<td>
							<a href=""><i class="fa fa-download"></i></a>
							<a href=""><i class="fa fa-pencil"></i></a>
							<a href=""><i class="fa fa-trash"></i></a>
						</td>
					</tr>
					<tr>
						<td>1</td>
						<td>Название лабораторной работы</td>
						<td>25.02.2016</td>
						<td>256Kb</td>
						<td>
							<a href=""><i class="fa fa-download"></i></a>
							<a href=""><i class="fa fa-pencil"></i></a>
							<a href=""><i class="fa fa-trash"></i></a>
						</td>
					</tr>
					<tr>
						<td>1</td>
						<td>Название лабораторной работы</td>
						<td>25.02.2016</td>
						<td>256Kb</td>
						<td>
							<a href=""><i class="fa fa-download"></i></a>
							<a href=""><i class="fa fa-pencil"></i></a>
							<a href=""><i class="fa fa-trash"></i></a>
						</td>
					</tr>
					<tr>
						<td>1</td>
						<td>Название лабораторной работы</td>
						<td>25.02.2016</td>
						<td>256Kb</td>
						<td>
							<a href=""><i class="fa fa-download"></i></a>
							<a href=""><i class="fa fa-pencil"></i></a>
							<a href=""><i class="fa fa-trash"></i></a>
						</td>
					</tr>
				</table>
				<a href="" class="btn_add">Добавить</a>
			</div>
		</div>

		<!--  -->

		<div class="col-md-6">
			<div class="lesson_matireal">
				<h4>Лабораторные</h4>
				<table>
					<tr>
						<th>№</th>
						<th>Название</th>
						<th>Дата</th>
						<th>Размер</th>
						<th>Действие</th>
					</tr>
					<tr>
						<td>1</td>
						<td>Название лабораторной работы</td>
						<td>25.02.2016</td>
						<td>256Kb</td>
						<td>
							<a href=""><i class="fa fa-download"></i></a>
							<a href=""><i class="fa fa-pencil"></i></a>
							<a href=""><i class="fa fa-trash"></i></a>
						</td>
					</tr>
					<tr>
						<td>1</td>
						<td>Название лабораторной работы</td>
						<td>25.02.2016</td>
						<td>256Kb</td>
						<td>
							<a href=""><i class="fa fa-download"></i></a>
							<a href=""><i class="fa fa-pencil"></i></a>
							<a href=""><i class="fa fa-trash"></i></a>
						</td>
					</tr>
					<tr>
						<td>1</td>
						<td>Название лабораторной работы</td>
						<td>25.02.2016</td>
						<td>256Kb</td>
						<td>
							<a href=""><i class="fa fa-download"></i></a>
							<a href=""><i class="fa fa-pencil"></i></a>
							<a href=""><i class="fa fa-trash"></i></a>
						</td>
					</tr>
					<tr>
						<td>1</td>
						<td>Название лабораторной работы</td>
						<td>25.02.2016</td>
						<td>256Kb</td>
						<td>
							<a href=""><i class="fa fa-download"></i></a>
							<a href=""><i class="fa fa-pencil"></i></a>
							<a href=""><i class="fa fa-trash"></i></a>
						</td>
					</tr>
					<tr>
						<td>1</td>
						<td>Название лабораторной работы</td>
						<td>25.02.2016</td>
						<td>256Kb</td>
						<td>
							<a href=""><i class="fa fa-download"></i></a>
							<a href=""><i class="fa fa-pencil"></i></a>
							<a href=""><i class="fa fa-trash"></i></a>
						</td>
					</tr>
				</table>
				<a href="" class="btn_add">Добавить</a>
			</div>
		</div>
	</div>
</div>
@stop