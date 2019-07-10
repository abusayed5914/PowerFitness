<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    protected $table = 'videos';
    protected $fillable = [
    	'title','video','video_category_id'/*,'image2','image3',*/
    ];
}
