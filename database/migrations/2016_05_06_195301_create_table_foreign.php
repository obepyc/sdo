<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableForeign extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        // ВК таблицы "студенты"

        Schema::table('students', function(Blueprint $table){
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('group_id')->references('id')->on('groups');
        });

        // ВК таблицы "группы"

        Schema::table('groups', function(Blueprint $table){
            $table->foreign('cathedra_id')->references('id')->on('cathedra');
        });

        // ВК таблицы "факультеты"

        Schema::table('department', function(Blueprint $table){
            $table->foreign('user_id')->references('id')->on('users');
        });

        // ВК таблицы "кафедры"

        Schema::table('cathedra', function(Blueprint $table){
            $table->foreign('department_id')->references('id')->on('department');
            $table->foreign('user_id')->references('id')->on('users');
        });

        // ВК таблицы "преподаватели"

        Schema::table('teachers', function(Blueprint $table){
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('cathedra_id')->references('id')->on('cathedra');
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
