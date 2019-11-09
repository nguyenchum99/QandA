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
  
    //hiển thị câu hỏi khảo sát có không
    public function getListSurveyYesNo(){

        $list1['ques_yesno'] = DB::table('questions_yesno')->paginate(10);

        // $list2['choices'] = DB::table('question_choice') ->paginate(2);
        // ->join('question_survey','question_choice.question_id','=','question_survey.id')
        // ->select('question_choice.choice',
        // 'question_survey.question','question_survey.id','question_survey.user_id')
        // ->get();
        return view('admin.question.list_survey',$list1);
    }

    //tạo câu hỏi khảo sát có không
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
        
        return redirect('admin/question/list_survey') -> with('thongbao','Thêm thành công');
    }


//hiển thị câu hỏi khảo sát lựa chọn trong 4 đáp án
    public function getAddSurvey(){


        $list['choices'] = DB::table('question_choice')
        ->join('question_survey','question_choice.question_id','=','question_survey.id')
        ->select('question_choice.choice',
        'question_survey.question','question_survey.id','question_survey.user_id')
        ->get();
        return view('admin.question.add_survey',$list);
    }


    //tạo câu hỏi  khảo sát lựa chọn trong 4 đáp án
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

   
    public function deleteYesNo($id){

        $question = Question_YesNo::find($id);
        $question ->delete();

        $answer = Answer_YesNo::where('question_id',$id)->delete();

        return redirect('admin/question/list_survey')->with('thongbao','Xóa thành công');
    }

    
}
