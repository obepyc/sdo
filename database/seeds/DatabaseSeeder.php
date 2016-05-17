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

		// Группа

		DB::table('groups')->insert([
			'cathedra_id' => 1,
			'name' => 'КН-12',
			'year' => 2012
			]);

		// Ректор

		DB::table('users')->insert([
			'surname' => 'Волошин',
			'name' => 'Вячеслав',
			'second_name' => 'Сепанович',
			'email' => "volosh@mail.ru",
			'password' => bcrypt('123'),
			'phone' => '+380989999987',
			'type' => 2,
			]);

		DB::table('teachers')->insert([
			'cathedra_id' => 1,
			'user_id' => 2,
			'position' => 'Ректор',
			'degree' => 'Профессор'
			]);

		// Рабочий план

		DB::table('work_plans')->insert([
			'group_id' => 1,
			'way_code' => '6.050101',
			'way_name' => 'Компьютерные науки',
			'level' => 'Бакалавр',
			'department_id' => 1,
			'training_form' => 'Дневная',
			'training_period' => 4,
			'qualification' => 'Специалист по информационным технологиям',
			'user_id' => 2
			]);
	}
}
