<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; 

class Applicant extends Model
{
    use SoftDeletes ; 
    
    protected $guarded = ['id'] ; 

    public function job()
    {
        return $this->belongsToMany('App\Job');
    }
}
