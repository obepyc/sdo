<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lessonmessage extends Model{

	protected $table = "lesson_messages";

	protected $fillable = [
	'work_lesson_id',
	'user_id',
	'title',
	'text'
	];

}
