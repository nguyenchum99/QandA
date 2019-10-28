<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use App\Question;
use App\Answer;
use App\User;
use App\Session;
use DB;

use Illuminate\Support\Facades\Auth;


class createSessionUser extends Controller
{
    //
    //tạo phiên hỏi đáp
    public function getCreateSession(){

        return view('home.manage.create_session');
    }

    public function postCreateSession(Request $request){

        $this->validate($request,

            [
                'name' => 'required|min:3|max:100',

            ],
            [
                'name.required' => 'Bạn chưa nhập tên phiên',
                'name.min' => 'Tên phiên phải ít nhất 3 kí tự',
                'name.max' => 'Tên phiên phải từ 3 đến 100 kí tự'

            ]);

            $session = new Session;
            $session -> name_session = $request -> name;
            $session -> user_id = Auth::user()->id;
            $session->save();

            return redirect('user/session/list_session_close') -> with('thongbao','Thêm thành công');
    }


    
    public function displaySessions(){

        $name_user['name'] = DB::table('users')
        ->join('session','users.id','=','session.user_id') 
        ->get();

        
        return view('home.manage.sessions',$name_user);

    }


    //tạo câu hỏi trong phiên hỏi đáp
    public function getCreateQuestionOnSession($id){
        
        $session = Session::find($id);

        
        return view('home.manage.create_question',['session'=>$session]);
    }


    public function postCreateQuestionOnSession(Request $request,$id){

        
        $question = new Question;
        $question -> question = $request -> question;
        $question -> user_id = Auth::user()->id;
        $question -> session_id = $id;
        $question-> save();

        return redirect("user/page/question_answer/".$question->id) ->with('thongbao','Tạo câu hỏi thành công') ;

    }

    
}


