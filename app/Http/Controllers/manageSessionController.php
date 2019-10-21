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

class manageSessionController extends Controller
{
    //

    //hiển thị danh sách  phiên
    public function getListSession(){

        $data['list_session'] = DB::table('session')->paginate(10);
        return view('admin.session.list_session',$data);
    }

    //xóa phiên
    public function deleteSession($id){

        $session = Session::find($id);

        $session ->delete();

        $question = Question::where('session_id',$id)->delete();

        return redirect('admin/session/list_session')->with('thongbao','Xóa phiên thành công');
    }

    //thêm phiên hỏi đáp
    public function getAddSession(){

        return view('admin.session.add_session');

    }

    public function postAddSession(Request $request){

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

            return redirect('admin/session/list_session') -> with('thongbao','Thêm thành công');
    }

    public function getEditSession($id){
        $session = Session::find($id);

        return view('admin.session.edit_session',['session'=>$session]);
    }

    public function postEditSession(Request $request, $id){

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

        return redirect('admin/session/edit/'.$id) -> with('thongbao','Sửa thành công');
    }

    //Tìm kiếm phiên trong admin
   public function getSearchSession(Request $req)
   {
       // $data = DB::table('users')->paginate(5);
       $tukhoa = $req->tukhoa;
       $session = Session::where('name_session', 'like', '%'.$req->tukhoa.'%')
                  ->get();

       return view('admin.session.search_session', compact('session'),['session'=>$session,'tukhoa'=>$tukhoa]);
   }

}
