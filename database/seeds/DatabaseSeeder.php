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
            'surname' => 'Admin',
            'name' => 'Admin',
            'second_name' => 'Admin',
            'email' => "admin@mail.ru",
            'password' => bcrypt('123'),
            'type' => '1',
            ]);
    	DB::table('users')->insert([
            'surname' => 'Мироненко',
            'name' => 'Дмитрий',
            'second_name' => 'Сергеевич',
            'email' => "teacher@mail.ru",
            'password' => bcrypt('123'),
            'type' => '2',
            ]);
    	DB::table('users')->insert([
            'surname' => 'Чернухин',
            'name' => 'Сергей',
            'second_name' => 'Александрович',
            'email' => "chern@mail.ru",
            'password' => bcrypt('123'),
            'type' => '3',
            ]);
        DB::table('users')->insert([
            'surname' => 'Филоненка',
            'name' => 'Лилия',
            'second_name' => 'Викторовна',
            'email' => "filo@mail.ru",
            'password' => bcrypt('123'),
            'type' => '3',
            ]);
    }
}
