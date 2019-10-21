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

class manageQuestionController extends Controller
{
    //
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

    //tìm kiếm câu hỏi
   public function getSearchQuestion(Request $req)
   {
       // $data = DB::table('users')->paginate(5);
       $tukhoa = $req->tukhoa;
       $question = Question::where('question', 'like', '%'.$req->tukhoa.'%')
                  ->get();

       return view('admin.question.search_question', compact('question'),['question'=>$question,'tukhoa'=>$tukhoa]);
   }


   


   
//    public function postAddQuestion(Request $request){
//         $this->validate($request,

//         [
//             'question' => 'required|min:10|max:100',

//         ],
//         [
//             'question.required' => 'Bạn chưa nhập nội dung câu hỏi',
//             'question.min' => 'Câu hỏi phải ít nhất 10 kí tự',
//             'question.max' => 'Câu hỏi  phải từ 10 đến 100 kí tự'

//         ]);

//         $question = new Question;
//         $question -> question = $request -> question;
//         $question -> user_id = Auth::user()->id;

//         $session->save();

//         return redirect('admin/session/list_session') -> with('thongbao','Thêm thành công');
//    }

}
