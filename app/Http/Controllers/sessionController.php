<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Question;
use App\Answer;
use App\User;
use App\Session;
use Carbon\Carbon;
use Hash;
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
        $name_user['name'] = DB::table('users')
        ->join('session','users.id','=','session.user_id')                                               
        ->get();
        // $question = DB::table('questions')->join('session','session.id','=','questions.session_id')
        //                                   ->get();
        // $count_ques['count'] = $question ->count();
                                                                                                                       
        //truyền dữ liệu sang view
        return view('home.session.list_session_close',$name_user);

    }



    //hiển thị danh sách phiên hoạt động
    public function getListSessionActive(){
        Carbon::setLocale('vi');
        $session['list'] = DB::table('session')->paginate(10);
        $name_user['name'] = DB::table('users')->join('session','users.id','=','session.user_id')
                                                ->get();
                                                                                                           
        //truyền dữ liệu sang view
        return view('home.session.list_session_active',$session,$name_user);
    }


    //check mật khẩu phiên hỏi đáp đang mở
    public function checkPasswordSession(Request $request,$id){

        $this->validate($request,
        [
            'password'=>'required'  
        ],[
            'password.required'=>'Bạn phải nhập mật khẩu phiên'
        ]);

        $check = $request->input('password');
        $session = Session::find($id);
       
        if($check == $session->password_session){
            
            return redirect("user/session/list_question_active/".$id);
        }
        else{
       
            return redirect("user/session/list_session_active")->with('thongbao','Mật khẩu sai');
        }
    }

    //hiển thị câu hỏi trong phiên hỏi đáp hoạt động
    public function getListQuestionActive($id){
        Carbon::setLocale('vi');
        $session = Session::find($id);
        $data['list'] = DB::table('questions')
        ->join('session','session.id','=','questions.session_id')
        ->join('users','questions.user_id','=','users.id')
        ->select('questions.id','questions.question',
        'session.name_session','questions.created_at','users.name','users.avatar')                                    
        ->where('session.id',$id)                                     
        ->get();

        return view('home.session.list_question_active',$data,['session'=>$session]);
    }


    //hiển thị các câu hỏi trong phiên hỏi đáp đóng
    public function getListQuestionOnSession($id)
    {
        Carbon::setLocale('vi');
        $data['list'] = DB::table('questions')
        ->join('session','session.id','=','questions.session_id')
        ->select('questions.id','questions.question','session.name_session','questions.created_at')                                    
        ->where('session.id',$id)                                     
        ->get();

        
        return view('home.session.list_question_on_session',$data);

    }


    //Tạo câu trả lời trong phiên hỏi đáp mở
    public function getCreateAnswer($id){
        Carbon::setLocale('vi');
        $question = Question::find($id);
        
        $answer = DB::table('answers')
        ->join('users','users.id','=','answers.user_id')
        ->select('users.name','users.avatar','answers.answer','answers.created_at')
        ->where('answers.question_id',$id)
        ->get();

        return view('home.session.create_answer',['question'=>$question,'list'=>$answer]);

    }

    public function postCreateAnswer(Request $request,$id){
        Carbon::setLocale('vi');
        $answer = new Answer;
        $answer -> answer = $request -> answer;
        $answer -> user_id = Auth::user()->id;
        $answer -> question_id = $id;
        $answer -> save();

        return redirect("user/session/create_answer/".$id) ->with('thongbao','Thêm câu trả lời thành công') ;

    }


    // //tạo câu hỏi trong phiên hỏi đáp
    // public function getCreateQuestionOnSession($id){
    //     Carbon::setLocale('vi');
    //     $session = Session::find($id);
    //     $user = DB::table('users')->join('session','session.user_id','=','users.id')
    //     ->select('users.name')
    //     ->where('session.id',$id)
    //     ->get();

    //     return view('home.session.list_question_active',['session'=>$session,'user'=>$user]);
    // }


    public function postCreateQuestionOnSession(Request $request,$id){
        
        Carbon::setLocale('vi');
        $question = new Question;
        $question -> question = $request -> question;
        $question -> user_id = Auth::user()->id;
        $question -> session_id = $id;
        $question-> save();

        return redirect("user/session/list_question_active/".$id) ->with('thongbao','Tạo câu hỏi thành công') ;

    }

   

}
