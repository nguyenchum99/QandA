<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Choice extends Model
{
    //
    protected $table="choice";

    public function question(){
         return $this->belongsTo('App\Survey');
      
    }

    // public function user(){
    //     return $this->hasMany('App\User');
    // }
}
