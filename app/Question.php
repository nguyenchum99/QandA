<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Question extends Model
{

    protected $table="questions";

    //Tạo quan hệ với  User
    public function user(){
        return $this->belongsTo('App\User');

    }

    //Tạo quan hệ với Answer
    public function answer(){
        return $this->hasMany('App\Answer');
    }
}
