<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;

use App\Question;
use App\Answer;
use App\User;
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
            return redirect('admin/question/listquestion');
          
        }
        else{

            return redirect('admin/login') ->with('thongbao','Đăng nhập không thành công');
        }
    }
    

    public function adminLogout(){
        Auth::logout();
        return redirect('admin/login');
    }

    
    //lấy danh sách  câu hỏi
    public function getListQuestion(){
        $data['list_question'] = DB::table('questions')->paginate(10);
        //truyền dữ liệu sang view
        return view('admin.question.list_question',$data);
    }


    //tìm id của câu hỏi muốn sửa
    public function editQuestion($id){

        $question = Question::find($id);

        return view('admin.question.edit_question',['question'=>$question]);

    }


    //sửa câu hỏi và in ra thông báo
    public function postQuestion(Request $request, $id){

        $question = Question::find($id);

        // check điều kiện
        $this -> validate($request,

            [
                'question' => 'required|min:10|max:300'
            ],
            [
                'question.required'=> 'Bạn chưa nhập câu hỏi',
                'question.min' => 'Câu hỏi có ít nhất 10 kí tự',
                'quesion.max' => 'Câu hỏi có nhiều nhất 300 kí tự'
            ]
        
        );

        $question -> question = $request -> question;
        $question -> save();

        return redirect('admin/question/edit/'.$id) -> with('thongbao','Sửa thành công');
    }

    //Xóa câu hỏi
    public function getDeleteQuestion($id){
        $question = Question::find($id);

        $question -> delete();

        $answer = Answer::where('question_id',$id)->delete();

        return redirect('admin/question/listquestion') -> with('thongbao','Bạn đã xóa thành công');
    }


    //lấy dữ liệu từ db truyền vào view
    public function getListAnswer(){
        $data['list_answer'] = DB::table('answers')->paginate(10);
        //truyền dữ liệu sang view
        return view('admin.answer.list_answer',$data);
    }


    // sửa bình luận
    public function editAnswer($id){

        $answer = Answer::find($id);



        return view('admin.answer.edit_answer',['answer'=>$answer]);

    }
    

    public function postAnswer(Request $request, $id){

        $answer = Answer::find($id);

        // check điều kiện
        $this -> validate($request,

            [
                'answer' => 'required|min:10|max:300'
            ],
            [
                'answer.required'=> 'Bạn chưa nhập câu trả lời',
                'answer.min' => 'Câu trả lời có ít nhất 10 kí tự',
                'answer.max' => 'Câu trả lời có nhiều nhất 300 kí tự'
            ]
        
        );

        $answer -> answer = $request -> answer;
        $answer -> save();

        return redirect('admin/answer/edit/'.$id) -> with('thongbao','Sửa thành công');
    }

    // xóa bình luận
    public function getDeleteAnswer($id){
        $answer = Answer::find($id);

        $answer -> delete();

        return redirect('admin/answer/listanswer') -> with('thongbao','Bạn đã xóa thành công');
    }



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
                'password'=>'required|min:3'
            ],
            [
                'name.required' => 'Bạn chưa nhập tên người dùng',
                'name.min' => 'Tên người dùng phải ít nhất 3 kí tự',
                'password.required' =>'Bạn chưa nhập mật khẩu',
                'password.min'=>'Mật khẩu phải ít nhất 3 kí tự'

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
                   ->orWhere('id',$req->tukhoa)
                   ->orWhere('email',$req->tukhoa)
                   ->get();

        return view('admin.user.search_user', compact('user'),['user'=>$user,'tukhoa'=>$tukhoa]);
    }

   

}
