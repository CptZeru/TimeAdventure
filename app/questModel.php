<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class questModel extends Model
{
    protected $fillable = [
		'quest_name',
		'quest_obj',
		'quest_level',
		'quest_reward'
	];
}
