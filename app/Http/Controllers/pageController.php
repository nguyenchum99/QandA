<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Http\Requests;

use App\Question;
use App\Answer;
use App\User;
use App\Session;

use App\Notification;
use DB;
use Carbon\Carbon;

use Illuminate\Support\Facades\Auth;

class pageController extends Controller
{
    //

     //cập nhật thông tin người dùng
     public function getEdit($id){

        $user = User::find($id);

        return view('home.user.edit_info',['user'=>$user]);
    }


    // cập nhật thông tin người dùng
    public function postEdit(Request $request,$id){

        $user = User::find($id);

        $this->validate($request,

        [
            'name' => 'required|min:3',
            'password'=> 'required|min:3',
            'passAgain' => 'required|same:password'

        ],
        [
            'name.required' => 'Bạn chưa nhập tên người dùng',
            'name.min' => 'Tên người dùng phải ít nhất 3 kí tự',
            'password.required'=> 'Bạn chưa nhập mật khẩu',
            'password.min' => 'Mật khẩu có ít nhất 3 kí tự',
            'passAgain.required'=> 'Bạn chưa nhập mật khẩu',
            'passAgain.same' => 'Mật khẩu bạn nhập lại chưa khớp'

        ]);

            $user -> name = $request -> name;
            $user -> password = bcrypt($request -> password);

            $user->save();
            
            return redirect('user/login') -> with('thongbao','Sửa thành công');
    }

    


    //hiện thông tin người dùng
    public function getInfo($id){

        $user = User::find($id);

        //đếm số câu hỏi
        $question = Question::where('user_id',$id)->get();
        $count_question = $question->count();

        

        return view('home.user.user_info',['user'=>$user,'question'=>$count_question]);
    }


    //hiện thị tất cả câu hỏi
    public function getListQuestion(){

        // $data['list'] = DB::table('questions')->get();
        Carbon::setLocale('vi');

        $data['list'] = DB::table('questions')->join('session','session.id','=','questions.session_id')
                                              ->select('questions.id','questions.question','session.name_session','questions.created_at')
                                              ->get();

        //truyền dữ liệu sang view
        return view('home.page.all_question',$data);

    }


    

    //lấy dữ liệu hiển thị câu trả lời của câu hỏi
    public function getListQuestionAnswer($id){

        Carbon::setLocale('vi');
        $question = DB::table('questions')->find($id);
        $answer = DB::table('answers')->where('question_id',$id)->get();

        $user = DB::table('users')
        ->join('questions','questions.user_id','=','users.id')
        ->select('users.name')
        ->get();
        
        //truyền dữ liệu sang view
        return view('home.page.content_question',
        ['question'=>$question, 'list_answer'=> $answer,'user'=>$user]);
    }


    public function getListNotification(){
        Carbon::setLocale('vi');

        $question = DB::table('questions')
        ->join('session','session.id','questions.session_id')
        ->leftJoin('users','users.id','=','questions.user_id')
        ->select('users.name','session.id','users.avatar','questions.created_at','questions.user_id')
        ->where('session.user_id',Auth::user()->id)
        ->get();

        $cntQues = $question->count();

        $answer = DB::table('answers')
        ->join('questions','questions.id','=','answers.question_id')
        ->leftJoin('users','users.id','=','answers.user_id')
        ->select('users.name','answers.user_id','answers.created_at','users.avatar','questions.id')
        ->where('questions.user_id',Auth::user()->id)
        ->get();

        $cntAnsw = $answer->count();
        $count = $cntQues + $cntAnsw;

        $noti = DB::table('notifi')
        ->select('notifi.notification','notifi.created_at')
        ->get();

        return view('home.layouts.notification_page',['question'=>$question,'answer'=>$answer,
        'noti'=>$noti]);
    }


}
