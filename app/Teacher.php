<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Teacher extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','course_id','phone'
    ];

    public function students(){
        return $this->hasMany('App\User');
    }

    public function course(){
        return $this->belongsTo('App\Course');
    }
}
