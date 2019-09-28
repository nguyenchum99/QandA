<?php

namespace App;

use App\Events\AnswerEvent;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    
    protected $table = "answers";
    
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function question(){
        return $this->belongsTo('App\Question');
    }

}
