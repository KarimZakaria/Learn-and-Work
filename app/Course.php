<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 

class Course extends Model
{
    use SoftDeletes ; 

    protected $guarded = ['id'] ; 

    public function category()
    {
        return $this->belongsTo('App\Category');
    }

    public function trainer()
    {
        return $this->belongsTo('App\Trainer');
    }
    
    public function student()
    {
        return $this->belongsToMany('App\Student');
    }

    public function user()
    {
        return $this->belongsToMany('App\User');
    }
    // ++
    public function place()
    {
        return $this->belongsToMany('App\Place');
    }

    public function comment()
    {
        return $this->belongsTo('App\Comment');
    }

}
