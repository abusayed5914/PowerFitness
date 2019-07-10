<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NutrationStart extends Model
{
    protected $table = 'nutrationplanstart';

    protected $fillable = [
    	'completedday','nutrationid','userid'
    ];
}
