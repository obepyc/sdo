@extends('layouts.main')

@section('title')
Добавление нового факультета
@stop

@section('content')

<!-- User profile -->

<div class="container">
	<div class="row">
		<div class="user_profile add_form">
			<h3>Добавление нового факультета</h3>
			<div class="profile_container">
				<div class="col-md-2"></div>
				<div class="col-md-6">
					<form action="{{route ('add.department')}}" method="post" class="add_new">
						<div class="form_group{{$errors->has('name') ? ' group_error' : ''}}">
							<p>Название факультета</p>
							<input type="text" name="name" placeholder="Название факультета" value="{{old('name') ? : ''}}">
						</div>
						<div class="form_group {{$errors->has('short_name') ? ' group_error' : ''}}">
							<p>Сокращенное название</p>
							<input type="text" name="short_name" placeholder="Сокращенное название" value="{{old('short_name') ? : ''}}">
						</div>
						<div class="form_group{{$errors->has('decan') ? ' group_error' : ''}}">
							<p>Декан факультета</p>
							<select name="decan" id="" class="chosen-select" data-placeholder="Выберите декана" style="width:350px; height:40px;">
								<option value=""></option>
								@if(count($users) > 0)
									@foreach($users as $user)
										<option value="{{$user->id}}" @if(old('decan') == $user->id) selected="select" @endif>{{$user->surname.' '.$user->name.' '.$user->second_name}}</option>
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
@stop