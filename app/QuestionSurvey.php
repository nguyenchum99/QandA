<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionSurvey extends Model
{
    //

    protected $table="question_survey";

    //Tạo quan hệ với  User
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function question(){
        return $this->hasMany('App\QuestionChoice');
    }
}
