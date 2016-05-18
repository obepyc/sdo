<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Worklesson extends Model{

	protected $table = 'work_lesson';

	protected $fillable = [
	'lesson_id',
	'description'
	];

}
