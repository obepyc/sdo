<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableTeacher extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('teachers', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('cathedra_id')->unsigned();  // Кафедра. к которой относится
            $table->integer('user_id')->unsigned();  // Пользователь
            $table->string('position')->length(250);  // Должность
            $table->string('degree')->length(250);  // Ученая степень
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
        Schema::drop('teachers');
    }
}
