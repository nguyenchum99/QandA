<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Answer_YesNo extends Model
{
    //
    protected $table = "answers_yesno";
    
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function question(){
        return $this->belongsTo('App\Question_YesNo');
    }


}
