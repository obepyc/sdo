<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableLessonMatireals extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lesson_matireals', function(Blueprint $table){
            $table->increments('id')->unsigned();
            $table->integer('work_lesson_id')->unsigned(); // Название предмета
            $table->string('type')->legth(150); // Тип материала (Лекция, лаборатораная, дополнительный)
            $table->string('name')->legth(150); // Название материала          
            $table->string('url')->legth(150); // Ссылка на материал         
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
