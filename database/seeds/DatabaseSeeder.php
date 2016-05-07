<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('users')->insert([
    		'email' => "admin@mail.ru",
    		'password' => bcrypt('123'),
            'surname' => "Surname",
            'name' => 'Name',
            'second_name' => 'Secondname',
    		'role' => '1',
    		]);
    	DB::table('users')->insert([
    		'email' => "teacher@mail.ru",
    		'password' => bcrypt('123'),
            'surname' => "Surname",
            'name' => 'Name',
            'second_name' => 'Secondname',
    		'role' => '2',
    		]);
    	DB::table('users')->insert([
    		'email' => "student@mail.ru",
    		'password' => bcrypt('123'),
            'surname' => "Surname",
            'name' => 'Name',
            'second_name' => 'Secondname',
    		'role' => '3',
    		]);
    }
}
