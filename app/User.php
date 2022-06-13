<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;


class User extends Authenticatable
{
    use SoftDeletes ;
    use Notifiable;

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function course()
    {
        return $this->belongsToMany('App\User');
    }

    public function profile()
    {
        return $this->hasOne('App\Profile');
    }

    public function comment()
    {
      return $this->hasOne('App\Comment');
    }
}
