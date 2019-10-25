<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    //
    protected $table="session";

    //Tạo quan hệ với  User
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function question(){
        return $this->hasMany('App\Question');
    }
}
