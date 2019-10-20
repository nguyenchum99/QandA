<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Question;
use App\Answer;
use App\User;

use DB;

use Illuminate\Support\Facades\Auth;

class sessionController extends Controller
{
    //

    public function getListSession(){

        $session['list'] = DB::table('session')->paginate(10);

        // $user['name_user'] = DB::table('users')

        //truyền dữ liệu sang view
        return view('home.session.list_session_close',$session);

    }

}
