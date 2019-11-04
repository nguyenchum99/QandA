<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;


use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable

{
   
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    use Notifiable;
    protected $table="users";
    

    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function question(){
        return $this->hasMany('App\Question');
    }

    public function answer(){
        return $this->hasMany('App\Answer');
    }

    public function session(){
        return $this->hasMany('App\Session');
    }

    public static function get_meta($question_id) {
        return DB::table('notifications')
            ->where('data->question_id', '=', $question_id)
            ->get();
    }

}
