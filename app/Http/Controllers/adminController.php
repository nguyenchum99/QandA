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

class adminController extends Controller
{

    //đăng nhập admin
    public function getAdminLogin(){

        return view('admin.login');
    }


    public function postAdminLogin(Request $request){

        $this->validate($request,
        [
            'name'=>'required',
            'password'=>'required'
        ],
        [
            'name.required'=>'Bạn chưa nhập tên admin',
            'password.required'=>'Bạn chưa nhập mật khẩu'

        ]);

        $credentials = [
            'name' => $request['name'],
            'password' => $request['password']
            
        ];


        if(Auth::attempt($credentials))
        {
            return redirect('admin/user/listuser');
          
        }
        else{

            return redirect('admin/login') ->with('thongbao','Đăng nhập không thành công');
        }
    }
    

    public function adminLogout(){
        Auth::logout();
        return redirect('admin/login');
    }


}
