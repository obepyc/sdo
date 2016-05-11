<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder{
	/**
	* Run the database seeds.
	*
	* @return void
	*/
	public function run(){
	
		// Пользователи

		DB::table('users')->insert([
			'surname' => 'Admin',
			'name' => 'Admin',
			'second_name' => 'Admin',
			'email' => "admin@mail.ru",
			'password' => bcrypt('123'),
			'phone' => 123,
			'type' => 1,
			]);

		// Факультет

		DB::table('department')->insert([
			'name' => 'Факультет информациооных технологий',
			'short_name' => 'ФИТ',
			'user_id' => 1
			]);

		// Кафедра

		DB::table('cathedra')->insert([
			'department_id' => 1,
			'name' => 'Компьютерные науки',
			'short_name' => 'КН',
			'user_id' => 1
			]);
	}
}
