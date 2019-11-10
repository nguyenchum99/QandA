<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Response extends Model
{
    //
    protected $table = "response";
    
    public function user(){
        return $this->belongsTo('App\User');
    }

    public function question(){
        return $this->belongsTo('App\Choice');
    }
}
