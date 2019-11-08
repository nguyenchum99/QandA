<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserResponse extends Model
{
    //
    protected $table = "user_response";
    
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function question(){
        return $this->belongsTo('App\QuestionChoice');
    }
}
