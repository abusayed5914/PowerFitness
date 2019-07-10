<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NutrationCategory extends Model
{
    protected $table = 'nutration_categorys';

    protected $fillable = [
    	'nutration_category_name','tips'
    ];
}
