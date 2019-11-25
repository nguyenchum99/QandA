<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    //

    protected $table="notifi";

    public function user(){
        return $this->belongsTo('App\User');

    }
}
