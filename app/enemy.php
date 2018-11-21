<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class enemy extends Model
{
    protected $fillable =[
		'enemy_name',
		'enemy_role',
		'enemy_hp',
		'enemy_mp'
	];
}
