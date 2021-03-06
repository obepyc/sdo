<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->string('surname')->length(150);  // Фамилия
            $table->string('name')->length(150);  // Имя
            $table->string('second_name')->length(150);  // Отчество
            $table->string('email')->unique();  // Почта (логин)
            $table->string('password');  // Пароль (будет hash)
            $table->string('phone')->length(50); // Телефон
            $table->integer('type')->length(1)->unsigned();  // Тип (1-админ, 2-преподаватель, 3-студент)
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
