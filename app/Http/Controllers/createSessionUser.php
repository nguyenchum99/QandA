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
            $session -> active = 1;
            $session->save();

            return redirect('user/session/list_session_active') -> with('thongbao','Thêm thành công');
    }


    //tạo câu hỏi trong phiên hỏi đáp
    public function getCreateQuestionOnSession($id){
        
        $session = Session::find($id);

        $user = DB::table('users')->join('session','session.user_id','=','users.id')
        ->select('users.name')
        ->where('session.id',$id)
        ->get();

        return view('home.manage.create_question',['session'=>$session,'user'=>$user]);
    }


    public function postCreateQuestionOnSession(Request $request,$id){

        
        $question = new Question;
        $question -> question = $request -> question;
        $question -> user_id = Auth::user()->id;
        $question -> session_id = $id;
        $question-> save();

        return redirect("user/page/question_answer/".$question->id) ->with('thongbao','Tạo câu hỏi thành công') ;

    }



    //hiện thị tất cả danh sách các phiên của người dùng
    public function getListSession($id){
        $id = Auth::user()->id;
        $session = DB::table('session')->join('users','users.id','=','session.user_id')
        ->select('session.id','session.name_session','session.active','users.avatar')
        ->where('users.id',$id)
        ->get();

        return view('home.manage.list_session_user',['list'=>$session]);

    }


    //Cho phép người dùng tự sửa phiên hỏi đáp
    public function getEditSession($id){
        $session = Session::find($id);
        return view('home.manage.edit_session',['session'=>$session]);

    }

    public function postEditSession(Request $request,$id){

        $session = Session::find($id);
        // check điều kiện
        $this -> validate($request,

            [
                'session' => 'required|min:10|max:300'
            ],
            [
                'session.required'=> 'Bạn chưa nhập tên phiên',
                'session.min' => 'Phiên có ít nhất 10 kí tự',
                'session.max' => 'Phiên có nhiều nhất 300 kí tự'
            ]
        
        );

        $session -> name_session = $request -> session;
        $session -> save();
        return redirect('user/manage/list/'.Auth::user()->id) -> with('thongbao','Sửa thành công');
    }


    //cho phép người dùng tự xóa phiên hỏi đáp của mình
    public function deleteSession($id){
        $session = Session::find($id);
        $session ->delete();
        $question = Question::where('session_id',$id)->delete();
        return redirect('user/manage/list/'.Auth::user()->id)->with('thongbao','Xóa phiên thành công');
    }

    public function postSessionUser(Request $request, $id){
        $session = Session::find($id);
        $this -> validate($request,['option'=>'required']);
        $session -> active = $request->input('option');
        $session ->save();
        return redirect('user/manage/list/'.$id) -> with('thongbao','Bạn đã thay đổi trạng thái phiên hỏi đáp');
    }

    
}


