<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Group extends Model{

	protected $table = 'groups';

	protected $fillable = [
	'cathedra_id',
	'name',
	'year'
	];

}
