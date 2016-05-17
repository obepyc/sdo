<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableNewForeign extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('work_plans', function(Blueprint $table){
            $table->foreign('group_id')->references('id')->on('groups');
            $table->foreign('department_id')->references('id')->on('department');
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::table('work_plan_lessons', function(Blueprint $table){
            $table->foreign('wp_id')->references('id')->on('work_plans');
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
