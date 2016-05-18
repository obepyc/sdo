<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableWorkLesson extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_lesson', function(Blueprint $table){
            $table->increments('id')->unsigned();
            $table->integer('lesson_id')->unsigned(); // Название предмета
            $table->string('description')->length(500); // Описание предмета
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
