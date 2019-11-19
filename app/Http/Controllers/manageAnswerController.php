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

class manageAnswerController extends Controller
{
    //
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
                'answer' => 'required|max:100'
            ],
            [
                'answer.required'=> 'Bạn chưa nhập câu trả lời',
                'answer.max' => 'Câu trả lời có nhiều nhất 100 kí tự'
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

    //tìm kiếm câu trả lời
    public function getSearchAnswer(Request $req)
   {
       // $data = DB::table('users')->paginate(5);
       $tukhoa = $req->tukhoa;
       $answer = Answer::where('answer', 'like', '%'.$req->tukhoa.'%')
                  ->get();

       return view('admin.answer.search_answer', compact('answer'),['answer'=>$answer,'tukhoa'=>$tukhoa]);
   }


   //tạo câu trả lời của admin
   public function getAddAnswer($id){

    $question = Question::find($id);
    return view('admin.question.add_answer',['question'=>$question]);

}


    public function postAddAnswer(Request $request,$id){

        $this->validate($request,
        [
            'answer' => 'required|max:100',

        ],
        [
            'answer.required' => 'Bạn chưa nhập nội dung câu hỏi',
            'answer.max' => 'Câu hỏi  phải từ 10 đến 100 kí tự'

        ]);

        $answer = new Answer;
        $answer -> answer = $request -> answer;
        $answer -> user_id = Auth::user()->id;
        $answer -> question_id = $id;
        $answer -> save();

        return redirect('admin/answer/listanswer') -> with('thongbao','Thêm thành công');
    }

}
