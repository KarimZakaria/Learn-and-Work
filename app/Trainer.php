<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 


class Trainer extends Model
{
    use SoftDeletes ; 

    protected $guarded = ['id']; 

    public function course()
    {
        return $this->hasMany('App\Course');
    }
}
