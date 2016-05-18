<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lessonmatireals extends Model{

	protected $table = "lesson_matireals";

	protected $fillable = [
	'work_lesson_id',
	'type',
	'name',
	'url'
	];
}
