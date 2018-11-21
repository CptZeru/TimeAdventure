<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class playerModel extends Model
{
    protected $fillable = [
		'player_name',
		'player_role',
		'player_clan'
	];
}
