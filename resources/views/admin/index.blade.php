@extends('layouts.main')

@section('title')
Главная страница - Администратор
@stop

@section('content')

<!-- Profile -->

	<div class="profile">
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12">
					<div class="user_profile">
						<div class="profile_img">
							<img src="img/account.jpg" alt="" height="150" width="150">
						</div>
						<div class="profile_info">
							<div class="main_info">
								<p class="user_fio">Иванов Иван Иванович</p>
								<div class="user_global_info">
									<span>Группа: <a href="">КН-12</a></span>
									<span>Куратор: <a href="">Мироненко Дмитрий Сергеевич</a></span>
									<span>Староста: <a href="">Филоненко Лилия</a></span>
								</div>
								<div class="user_self_info">
									<span>E-mail: <b>ivanov@mail.ru</b></span>
									<span>Телефон: <b>+380963258741</b></span>
								</div>
							</div>
							<div class="settings">
								<a href="" class="edit">Редактировать</a>
							</div>
						</div>
						<div class="clr"></div>
					</div>
				</div>
			</div>
		</div>
		<div class="hide" data-target="user_profile"><i class="fa fa-chevron-up"></i></div>
	</div>

@stop