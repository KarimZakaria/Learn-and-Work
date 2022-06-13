<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 

class Comment extends Model
{
    use SoftDeletes ; 

    protected $guarded = ['id'];
    
    public function course()
    {
        return $this->hasMany('App\Course');
    }

    public function user()
    {
        return $this->hasMany('App\User');
    }
}
