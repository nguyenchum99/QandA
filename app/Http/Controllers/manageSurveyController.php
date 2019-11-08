<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests;

use App\Question_YesNo;
use App\Answer_YesNo;
use App\User;

use App\QuestionSurvey;
use App\QuestionChoice;
use App\UserResponse;

use DB;

use Illuminate\Support\Facades\Auth;
class manageSurveyController extends Controller
{
    //
    //tạo câu khảo sát có không
    public function getAddSurvey(){
        return view('admin.question.add_survey');
    }


    public function postAddQuestionYesNo(Request $request){
        $this->validate($request,
        [
            'question' => 'required|min:3|max:100',

        ],
        [
            'question.required' => 'Bạn chưa nhập nội dung câu hỏi',
            'question.min' => 'Câu hỏi phải ít nhất 10 kí tự',
            'question.max' => 'Câu hỏi  phải từ 10 đến 100 kí tự'

        ]);

        $question = new Question_YesNo;
        $question -> question = $request -> question;
        $question -> user_id = Auth::user()->id;
        $question-> save();
        
        return redirect('admin/question/add_survey') -> with('thongbao','Thêm thành công');
    }

    public function postAddQuestionChoice(Request $request){

        $this->validate($request,
        [
            'question' => 'required|min:3|max:100',
             'choice1' => 'required',
             'choice2' => 'required',
             'choice3' => 'required',
             'choice4' => 'required',

        ],
        [
            'question.required' => 'Bạn chưa nhập nội dung câu hỏi',
            'question.min' => 'Câu hỏi phải ít nhất 10 kí tự',
            'question.max' => 'Câu hỏi  phải từ 10 đến 100 kí tự',
            'choice1.required' => 'Bạn chưa nhập nội dung đáp án 1',
            'choice2.required' => 'Bạn chưa nhập nội dung đáp án 2',
            'choice3.required' => 'Bạn chưa nhập nội dung đáp án 3',
            'choice4.required' => 'Bạn chưa nhập nội dung đáp án 4',

        ]);

        $question = new QuestionSurvey;
        $question -> question = $request -> question;
        $question -> user_id = Auth::user()->id;
        $question-> save();
         
        $id_ques = $question -> id;

        $choice = new QuestionChoice;
        $choice ->question_id = $id_ques;
        $choice ->choice = $request -> choice1;
        $choice->save();

        $choice = new QuestionChoice;
        $choice ->question_id = $id_ques;
        $choice ->choice = $request -> choice2;
        $choice->save();

        $choice = new QuestionChoice;
        $choice ->question_id = $id_ques;
        $choice ->choice = $request -> choice3;
        $choice->save();

        $choice = new QuestionChoice;
        $choice ->question_id = $id_ques;
        $choice ->choice = $request -> choice4;
        $choice->save();
      
        
        return redirect('admin/question/add_survey') -> with('thongbao','Thêm thành công');
    }

    
}
