<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
// 	   public function getCreated_dateAttribute($value)
// 	{
// 	    return Carbon::create($value)->diffForHumans();
// 	}
	protected $dates = [
        'created_at',
        'updated_at'
    ];
}
