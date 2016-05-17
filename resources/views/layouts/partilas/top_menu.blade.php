<!-- Top menu -->

<div class="container-fluid">
	<div class="row">
		<div class="top_menu">
			<div class="col-md-12">
				<ul id="main_menu">
					<li><a href="{{route('home')}}">Главная</a></li>
					@if(Auth::user()->type != '1')
					<li><a href="#">Предметы</a></li>
					<li><a href="#">Преподаватели</a></li>			
					@else
					<li><a href="{{route('all.users')}}">Пользователи</a></li>
					<li><a href="#">Управление</a></li>
					@endif
				</ul>
				<a href="{{route('logout')}}" class="exit">Выйти</a>
			</div>
		</div>
	</div>
</div>