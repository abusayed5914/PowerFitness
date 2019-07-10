<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SevenDayPlan extends Model
{
    protected $table = 'sevendaysplan';

    protected $fillable = [
    	'title','first','second','third','fourth','fifth','sixth','seventh','image'
    ];
}
