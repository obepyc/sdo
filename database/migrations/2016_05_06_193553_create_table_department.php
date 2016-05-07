<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDepartment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('department', function (Blueprint $table) {
            $table->increments('id')->unsignet();
            $table->string('name')->length(150);  // Название "Факультет информационных технологий"
            $table->string('short_name')->length(50);  // Короткое название "ФИТ"
            $table->integer('user_id')->unsigned();  // Декан
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
