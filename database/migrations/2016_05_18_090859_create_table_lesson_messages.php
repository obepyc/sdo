<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableLessonMessages extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lesson_messages', function(Blueprint $table){
            $table->increments('id')->unsigned();
            $table->integer('work_lesson_id')->unsigned(); // Название предмета
            $table->integer('user_id')->unsigned(); // Кто отправил
            $table->string('title')->legth(150); // Заголовок сообщения
            $table->string('text')->legth(150); // Текст сообщения  
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
