<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MyController extends Controller
{
    //
    public function getView(){
        
        return view('home\user_register');
    }

    
}
