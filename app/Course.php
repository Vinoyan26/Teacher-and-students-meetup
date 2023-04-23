<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = [
        'id','name','fees'
    ];

    public function teachers(){
        return $this->hasMany('App\Teacher');
    }

    public function students(){
        return $this->belongsToMany('App\User');
    }
}
