<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Workout extends Model
{
    protected $table = 'workouts';
    protected $fillable = [
    	'title','description','category','image','set1','set2','set3','image2','image3',
    ];
}
