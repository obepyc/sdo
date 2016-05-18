<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableWorkPlan extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('work_plans', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('group_id')->unsigned(); // Группа
            $table->string('way_code')->length(50); // Направление подготовки (код)
            $table->string('way_name')->length(250); // Направление подготовки (название)
            $table->string('level')->length(100); // Квалификационный уровень (бакалавр, магистр ...)
            $table->integer('department_id')->unsigned(); // Факультет
            $table->string('training_form'); // Форма обучения (1-дневная, 2-заочная)
            $table->float('training_period'); // Срок обучения
            $table->string('qualification')->length(250); // Квалификация
            $table->integer('user_id')->unsigned();  // Кто утвердил
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
        Schema::drop('work_plans');
    }
}
