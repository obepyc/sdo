<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableWorkPlanLesson extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_plan_lessons', function (Blueprint $table) {
            $table->increments('id')->unsignet();
            $table->integer('wp_id')->unsigned(); // Рабочий план
            $table->string('name')->length(250); // Название предмета
            $table->float('credits'); // Кредиты
            $table->integer('hour')->unsigned(); // Часы
            $table->string('semester')->length(250); // Семестр
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
