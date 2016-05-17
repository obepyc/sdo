<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableCathedra extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cathedra', function (Blueprint $table) {
            $table->increments('id')->unsignet();
            $table->integer('department_id')->unsigned();  // Факультет
            $table->string('name')->unique()->length(150);  // Название "Компьютерные науки"
            $table->string('short_name')->unique()->length(50);  // Короткое название "КН"
            $table->integer('user_id')->unsigned();  // Зав.кафедры
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
        Schema::drop('cathedra');
    }
}
