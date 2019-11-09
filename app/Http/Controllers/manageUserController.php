<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;

use App\Question;
use App\Answer;
use App\User;
use App\Session;

use App\Question_YesNo;
use App\Answer_YesNo;
use App\QuestionSurvey;
use App\UserResponse;

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
                'password'=> 'required|min:3',
                'passAgain' => 'required|same:password'

            ],
            [
                'name.required' => 'Bạn chưa nhập tên người dùng',
                'email.required' => 'Bạn chưa nhập email',
                'email.email'=> 'Bạn chưa nhập đúng định dạng email',
                'email.unique'=> 'Email đã tồn tại',
                'password.required'=> 'Bạn chưa nhập mật khẩu',
                'password.min' => 'Mật khẩu có ít nhất 3 kí tự',
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
            'password'=> 'required|min:3',
            
        ],
        [
            'name.required' => 'Bạn chưa nhập tên người dùng',
            'name.min' => 'Tên người dùng phải ít nhất 3 kí tự',
            'password.required'=> 'Bạn chưa nhập mật khẩu',
            'password.min' => 'Mật khẩu có ít nhất 3 kí tự',

            

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
        
        $question_yesno = Question_YesNo::where('user_id',$id)->delete();
        $answer_yesno = Answer_yesNo::where('user_id',$id)->delete();
        
        $question_survey = QuestionSurvey::where('user_id',$id)->delete();
        $user_response = UserResponse::where('user_id',$id)->delete();

        return redirect('admin/user/listuser')->with('thongbao','Xóa người dùng thành công');
    }

    //Tìm kiếm user trong admin
    public function getSearch_user(Request $req)
    {

        $tukhoa = $req->tukhoa;
        $user = User::where('name', 'like', '%'.$req->tukhoa.'%')
                   ->orWhere('email',$req->tukhoa)
                   ->get();

        return view('admin.user.search_user', compact('user'),['user'=>$user,'tukhoa'=>$tukhoa]);
    }

    //profile admin
    public function profile() {
        return view('admin.user.profile', array('user' => Auth::user()));
    }

    public function update_avatar(Request $request){

        if($request->hasFile('avatar')){
            
            $this->validate($request, 
                [
                    //Kiểm tra đúng file đuôi .jpg,.jpeg,.png.gif và dung lượng không quá 5M
                    'avatar' => 'mimes:jpg,jpeg,png,gif|max:5000',
                ],          
                [
                    //Tùy chỉnh hiển thị thông báo không thõa điều kiện
                    'avatar.mimes' => 'Chỉ chấp nhận avatar với đuôi .jpg .jpeg .png .gif',
                    'avatar.max' => 'Avatar giới hạn dung lượng không quá 5M',
                ]
            );
            
            //Lưu hình ảnh vào thư mục public/img/avatar
            $file = $request->file('avatar');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $user = Auth::user();
            $file->move('img/avatars/', $filename);
            $user->avatar = $filename;
        } else {
            return $request;
            $user->avatar = 'img/avatars/image.jpg';
        }
        
        $user->save();
        return redirect('admin/profile')-> with('thongbao','Cập nhật avatar thành công');
    }
}
