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


    function __construct(){
        $question = Question::all();
    }

    public function getListSession(){

        $session['list'] = DB::table('session')->paginate(10);


        $name_user['name'] = DB::table('users')->join('session','users.id','=','session.user_id')
                                                
                                                ->get();

                                                                                                                          
        //truyền dữ liệu sang view
        return view('home.session.list_session_close',$session,$name_user);

    }


    //hiển thị các câu hỏi trong phiên hỏi đáp
    public function getListQuestionOnSession($id)
    {
       
        $data['list'] = DB::table('questions')
        ->join('session','session.id','=','questions.session_id')
        ->select('questions.id','questions.question','session.name_session','questions.created_at')                                    
        ->where('session.id',$id)                                     
        ->get();


        return view('home.session.list_question_on_session',$data);

    }


}
