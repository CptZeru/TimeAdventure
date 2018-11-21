<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class generalShopModel extends Model
{
    protected $fillable = [
		'item_name',
		'price'
	];
}
