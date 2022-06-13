<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 


class Student extends Model
{
    use SoftDeletes ; 
    
    protected $guarded = ['id'];

    public function course()
    {
        return $this->belongsToMany('App\Course')->withPivot('status');
    }
}
