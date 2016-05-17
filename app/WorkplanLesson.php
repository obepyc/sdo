<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkplanLesson extends Model{

	protected $table = 'work_plan_lessons';

	protected $fillable = [
	'wp_id',
	'name',
	'credits',
	'hour',
	'semester'
	];

}
