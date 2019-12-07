<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    public function meals(){
        return $this->belongsTo(Meal::class, 'meal_id');
    }
}
