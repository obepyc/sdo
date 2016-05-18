<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableLessonForeign extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('work_plan_lessons', function(Blueprint $table){
            $table->foreign('name')->references('id')->on('lessons');
        });

        Schema::table('work_lesson', function(Blueprint $table){
            $table->foreign('lesson_id')->references('id')->on('lessons');
        });

        Schema::table('lesson_teachers', function(Blueprint $table){
            $table->foreign('work_lesson_id')->references('id')->on('work_lesson');
            $table->foreign('user_id')->references('id')->on('users');
        });
        Schema::table('lesson_matireals', function(Blueprint $table){
            $table->foreign('work_lesson_id')->references('id')->on('work_lesson');
        });
        Schema::table('lesson_messages', function(Blueprint $table){
            $table->foreign('work_lesson_id')->references('id')->on('work_lesson');
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
