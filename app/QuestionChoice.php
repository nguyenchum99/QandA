<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuestionChoice extends Model
{
    //
    protected $table="question_choice";

    public function question(){
         return $this->belongsTo('App\QuestionSurvey');
      
    }

    

    public function user(){
        return $this->hasMany('App\User');
    }
}
