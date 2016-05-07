<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable{

    protected $table = 'users';

    protected $fillable = [
        'surname',
        'name',
        'second_name', 
        'email', 
        'password',
        'type'
    ];

    protected $hidden = [
        'password',
        'remember_token'
    ];
}
