<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cathedra extends Model
{
	protected $table = "cathedra";

	protected $fillable = [
		'name',
		'short_name',
		'user_id',
		'department_id'
	];
}
