<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableLessonTeachers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lesson_teachers', function(Blueprint $table){
            $table->increments('id')->unsigned();
            $table->integer('work_lesson_id')->unsigned(); // Название предмета
            $table->integer('user_id')->unsigned(); // Преподаватель
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
        //
    }
}
