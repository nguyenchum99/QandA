<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Survey extends Model
{
    //
    protected $table="survey";

    //Tạo quan hệ với  User
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function question(){
        return $this->hasMany('App\Choice');
    }
}
