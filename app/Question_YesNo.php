<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Question_YesNo extends Model
{
    //
    protected $table="questions_yesno";

    //Tạo quan hệ với  User
    public function user(){
        return $this->belongsTo('App\User');

    }

    //Tạo quan hệ với Answer
    public function answer_yesno(){
        return $this->hasMany('App\Answer_YesNo');
    }

}
