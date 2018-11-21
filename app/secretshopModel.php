<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class secretshopModel extends Model
{
    protected $fillable =[
		'item_name',
		'price'
	];
}
