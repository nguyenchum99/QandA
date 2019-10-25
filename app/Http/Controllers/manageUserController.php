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

class manageUserController extends Controller
{
    //

    // hiển thị danh sách user
    public function getListUser(){
        
        $data['list_user'] = DB::table('users')->paginate(10);
        return view('admin.user.list_user',$data);
    }

    
    public function getAddUser(){


        return view('admin.user.add_user');
    }


    //Thêm user mới
    public function postAddUser(Request $request){

        $this->validate($request,

            [
                'name' => 'required|min:3',
                'email' => 'required|email|unique:users,email',
                'password'=> 'required|min:3|max:30',
                'passAgain' => 'required|same:password'

            ],
            [
                'name.required' => 'Bạn chưa nhập tên người dùng',
                'name.min' => 'Tên người dùng phải ít nhất 3 kí tự',
                'email.required' => 'Bạn chưa nhập email',
                'email.email'=> 'Bạn chưa nhập đúng định dạng email',
                'email.unique'=> 'Email đã tồn tại',
                'password.required'=> 'Bạn chưa nhập mật khẩu',
                'password.min' => 'Mật khẩu có ít nhất 3 kí tự',
                'password.max' => 'Mât khẩu có nhiều nhất 30 kí tự',
                'passAgain.required'=> 'Bạn chưa nhập mật khẩu',
                'passAgain.same' => 'Mật khẩu bạn nhập lại chưa khớp'

            ]);

            $user = new User;
            $user -> name = $request -> name;
            $user -> email = $request -> email;
            $user -> password = bcrypt($request -> password);
            $user -> level = $request -> level;

            $user->save();

            return redirect('admin/user/adduser') -> with('thongbao','Thêm thành công');
    }

     //Sửa thông tin user
     public function getEditUser($id){

        $user = User::find($id);

        return view('admin.user.edit_user',['user'=>$user]);
    }

    public function postEditUser(Request $request,$id){

        $user = User::find($id);

        $this->validate($request,

        [
            'name' => 'required|min:3',
            'password'=> 'required|min:3|max:30',
            
        ],
        [
            'name.required' => 'Bạn chưa nhập tên người dùng',
            'name.min' => 'Tên người dùng phải ít nhất 3 kí tự',
            'password.required'=> 'Bạn chưa nhập mật khẩu',
            'password.min' => 'Mật khẩu có ít nhất 3 kí tự',
            'password.max' => 'Mât khẩu có nhiều nhất 30 kí tự'
            

        ]);

            $user -> name = $request -> name;
            $user -> password = bcrypt($request -> password);
            $user -> level = $request -> level;

            $user->save();

            return redirect('admin/user/listuser') -> with('thongbao','Sửa thành công');

    }


    //Xóa user
    public function deleteUser($id){

        $user = User::find($id);

        $user->delete();

        $session = Session::where('user_id',$id)->delete();
        $question = Question::where('user_id',$id)->delete();
        $answer = Answer::where('user_id',$id)->delete();
       
        return redirect('admin/user/listuser')->with('thongbao','Xóa người dùng thành công');
    }

    //Tìm kiếm user trong admin
    public function getSearch_user(Request $req)
    {
        // $data = DB::table('users')->paginate(5);
        $tukhoa = $req->tukhoa;
        $user = User::where('name', 'like', '%'.$req->tukhoa.'%')
                   ->orWhere('email',$req->tukhoa)
                   ->get();

        return view('admin.user.search_user', compact('user'),['user'=>$user,'tukhoa'=>$tukhoa]);
    }
}
