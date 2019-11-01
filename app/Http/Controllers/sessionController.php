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


    //hiển thị danh sách phiên đã đóng
    public function getListSession(){

        $session['list'] = DB::table('session')->paginate(10);


        $name_user['name'] = DB::table('users')->join('session','users.id','=','session.user_id')
                                                
                                                ->get();

                                                                                                                          
        //truyền dữ liệu sang view
        return view('home.session.list_session_close',$session,$name_user);

    }



    //hiển thị danh sách phiên hoạt động
    public function getListSessionActive(){
        $session['list'] = DB::table('session')->paginate(10);
        $name_user['name'] = DB::table('users')->join('session','users.id','=','session.user_id')
                                                
                                                ->get();
                                                                                                           
        //truyền dữ liệu sang view
        return view('home.session.list_session_active',$session,$name_user);
    }

    //hiển thị câu hỏi trong  phiên hỏi đáp mở
    public function getListQuestionActive($id){

        $data['list'] = DB::table('questions')
        ->join('session','session.id','=','questions.session_id')
        ->select('questions.id','questions.question','session.name_session','questions.created_at')                                    
        ->where('session.id',$id)                                     
        ->get();


        return view('home.session.list_question_active',$data);
    }

    
    //hiển thị các câu hỏi trong phiên hỏi đáp đóng
    public function getListQuestionOnSession($id)
    {
       
        $data['list'] = DB::table('questions')
        ->join('session','session.id','=','questions.session_id')
        ->select('questions.id','questions.question','session.name_session','questions.created_at')                                    
        ->where('session.id',$id)                                     
        ->get();


        return view('home.session.list_question_on_session',$data);

    }


    //Tạo câu trả lời trong phiên hỏi đáp mở
    public function getCreateAnswer($id){
        $question = Question::find($id);
        return view('home.session.create_answer',['question'=>$question]);

    }

    public function postCreateAnswer(Request $request,$id){

        $answer = new Answer;
        $answer -> answer = $request -> answer;
        $answer -> user_id = Auth::user()->id;
        $answer -> question_id = $id;
        $answer -> save();

        return redirect("user/page/listquestion") ->with('thongbao','Thêm câu trả lời thành công') ;

    }


    


}
