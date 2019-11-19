<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests;

use App\Question;


use App\Question_YesNo;
use App\Answer_YesNo;
use App\User;

use App\QuestionSurvey;
use App\QuestionChoice;
use App\UserResponse;

use App\Survey;
use App\Choice;
use App\Response;

use DB;

use Illuminate\Support\Facades\Auth;
class manageSurveyController extends Controller
{
  
    //hiển thị câu hỏi khảo sát có không
    public function getListSurveyYesNo(){

        $list1 = DB::table('questions_yesno')->paginate(10);

        // $countYes = DB::table('answers_yesno')
        //                     ->select(array('answers_yesno.*',DB::raw('COUNT(answers_yesno.question_id)')))
        //                     ->where('answers_yesno.answer','=',1)
        //                     ->join('questions_yesno','questions_yesno.id','=','answers_yesno.question_id')
        //                     ->groupBy('answers_yesno.question_id')
        //                     ->get();
                            
      
        // $countNo = DB::table('answers_yesno')
        //                     ->select(DB::raw('count(*), question_id'))
        //                     ->where("answer","=","0")
        //                     ->groupBy('question_id')
        //                     ->get();   
        
        return view('admin.question.list_survey',
        ['ques_yesno'=>$list1]);
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

    
    //sửa phiên
    public function getEditYesNo($id){
        $question = Question_YesNo::find($id);

        return view('admin.question.edit_yesno',['question'=>$question]);
    }

    public function postEditYesNo(Request $request, $id){

        $question = Question_YesNo::find($id);

        // check điều kiện
        $this -> validate($request,

            [
                'question' => 'required|min:3|max:100'
            ],
            [
                'question.required'=> 'Bạn chưa nhập tên câu hỏi',
                'question.min' => 'Câu hỏi có ít nhất 3 kí tự',
                'question.max' => 'Câu hỏi có nhiều nhất 100 kí tự'
            ]
        
        );

        $question -> question = $request -> question;
        $question -> save();

        return redirect('admin/question/edit_yesno/'.$id) -> with('thongbao','Sửa thành công');
    }

    public function getLayoutOpinion(Request $request){
        $number = $request->input('number');
        return view('admin.question.create_opinion',['number'=>$number]);

    }

    public function postNumber(Request $request){
        $number = $request->input('number');
        return redirect('admin/question/layout_opinion');
    }
   


    public function postCreateOpinion(Request $request){
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

        $question = new Survey;
        $question -> question = $request -> question;
        $question -> user_id = Auth::user()->id;
        $question-> save();
         
        $id_ques = $question -> id;

        $choice = new Choice;
        $choice ->question_id = $id_ques;
        $choice ->choice = $request -> choice1;
        $choice->save();

        $choice = new Choice;
        $choice ->question_id = $id_ques;
        $choice ->choice = $request -> choice2;
        $choice->save();

        $choice = new Choice;
        $choice ->question_id = $id_ques;
        $choice ->choice = $request -> choice3;
        $choice->save();

        $choice = new Choice;
        $choice ->question_id = $id_ques;
        $choice ->choice = $request -> choice4;
        $choice->save();
      
        
        return redirect('admin/question/layout_opinion') -> with('thongbao','Thêm thành công');
    }

    public function postQuestionAnswer(Request $request){

        $this-> validate($request,[
            'question' => 'required',
        ],[
            'question.required' => 'Bạn chưa nhập nội dung câu hỏi',
        ]);

        $question = new Question;
        $question ->user_id= Auth::user()->id;
        $question->question = $request->question;

        $question->save();
        return redirect('admin/question/list_survey') -> with('thongbao','Thêm thành công');

    }
}
