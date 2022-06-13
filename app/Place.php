<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 


class Place extends Model
{

    use SoftDeletes ;  
    
    protected $guarded = ['id']; 

    public function course()
    {
        return $this->belongsToMany('App\Course' , 'course_place');
    }
}
