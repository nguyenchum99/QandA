<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Question;
use App\Answer;
use App\User;

use DB;

use Illuminate\Support\Facades\Auth;

class userController extends Controller
{
    
    public function __construct(){
        
        if(Auth::check()){
            view()->share('user_login',Auth::user());
        }
        
    }


    //chuyển đến trang chủ
    public function getUserLogin(){
        
        return view('home.user_login');
    }


    //đăng nhập người dùng
    public function postUserLogin(Request $request){

        $this->validate($request,
        [
            'name'=>'required',
            'password'=>'required'
        ],
        [
            'name.required'=>'Bạn chưa nhập tên đăng nhập',
            'password.required'=>'Bạn chưa nhập mật khẩu'

        ]);

        $credentials = [
            'name' => $request['name'],
            'password' => $request['password']
            
        ];


        if(Auth::attempt($credentials))
        {
            return redirect('user/home');
          
        }
        else{

            return redirect('user/login') ->with('thongbao','Đăng nhập không thành công');
        }

    }


    //đăng xuất
    public function userLogout(){

        Auth::logout();
        return redirect('user/login');
    }




    public function getview(){
        return view('home.layouts.index_page');
    }



    //chuyển đến trang đăng kí người dùng
    public function getUserRegister(){

        return view('home.user_register');
    }



    //đăng kí người dùng
    public function postUserRegister(Request $request){

        $this->validate($request,

            [
                'name' => 'required|min:3',
                'email' => 'required|email|unique:users,email',
                'password'=> 'required|min:3|max:30',
                'cpassword' => 'required|same:password'

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
                'cpassword.required'=> 'Bạn chưa nhập mật khẩu',
                'cpassword.same' => 'Mật khẩu bạn nhập lại chưa khớp'

            ]);

            $user = new User;
            $user -> name = $request -> name;
            $user -> email = $request -> email;
            $user -> password = bcrypt($request -> password);
            $user->level = 0;
            $user->save();

            return redirect('user/login') -> with('thongbao','Đăng kí thành công');
    }




   

}
