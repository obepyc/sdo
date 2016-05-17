<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Workplan extends Model{

	protected $table = 'work_plans';

	protected $fillable = [
	'group_id',
	'way_code',
	'way_name',
	'level',
	'department_id',
	'training_form',
	'training_period',
	'qualification',
	'user_id'
	];

}
