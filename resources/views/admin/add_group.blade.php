@extends('layouts.main')

@section('title')
Добавление группы
@stop

@section('content')

<!-- User profile -->

<div class="container">
	<div class="row">
		<div class="user_profile add_form">
			<h3>Добавление группы</h3>
			<div class="profile_container">
				<div class="col-md-2"></div>
				<div class="col-md-6">
					<form action="{{route ('add.group')}}" method="post" class="add_new">

						<div class="form_group{{$errors->has('cathedra') ? ' group_error' : ''}}">
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

						<div class="form_group{{$errors->has('name') ? ' group_error' : ''}}">
							<p>Название</p>
							<input type="text" name="name" placeholder="Название" value="{{old('name') ? : ''}}">
						</div>

						<div class="form_group{{$errors->has('year') ? ' group_error' : ''}}">
							<p>Год создания</p>
							<input type="text" name="year" placeholder="Год создания" value="{{old('year') ? : ''}}">
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