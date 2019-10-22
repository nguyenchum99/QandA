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

        $name_user['name'] = DB::table('users')->join('session','users.id','=','session.user_id')
                                                ->get();
                                                
        //truyền dữ liệu sang view
        return view('home.session.list_session_close',$session,$name_user);

    }

}
