<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests;

use App\Question;
use App\Answer;

use App\Question_YesNo;
use App\Answer_YesNo;
use App\User;

use App\QuestionSurvey;
use App\QuestionChoice;
use App\UserResponse;

use App\Survey;
use App\Choice;
use App\Response;
use Charts;
use DB;

use Illuminate\Support\Facades\Auth;
class manageSurveyController extends Controller
{
  
    //hiển thị câu hỏi khảo sát có không
    public function getListSurveyYesNo(){

        $list1 = DB::table('questions_yesno')->paginate(5);

        $list2 = DB::table('questions')->whereNull('session_id')->get();
        
        return view('admin.question.list_survey',
        ['ques_yesno'=>$list1,'question'=>$list2]);
    }

    public function getListQuestionAnswer($id){

        $question = Question::find($id);

        $list = DB::table('answers')->where('answers.question_id',$id)->get();

        return view('admin.question.answer',['list'=>$list,'question'=>$question]);
    }

    public function deleteQuestion($id){

        $question = Question::find($id);
        $question ->delete();

        $answer = Answer::where('question_id',$id)->delete();

        return redirect('admin/question/list_survey')->with('thongbao','Xóa thành công');

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

        $list['choices'] = DB::table('question_survey')->get();
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

    public function getLayoutOpinion(){

        return view('admin.question.create_opinion');

    }



    public function postCreateOpinion(Request $request){
        $this->validate($request,
        [
            'question' => 'required|min:3|max:100',
             'choice' => 'required|array|min:1',
             'choice.*'=>'required|min:3',
            

        ],
        [
            'question.required' => 'Bạn chưa nhập nội dung câu hỏi',
            'question.min' => 'Câu hỏi phải ít nhất 3 kí tự',
            'question.max' => 'Câu hỏi  phải từ 3 đến 100 kí tự',
            'choice.*.required' =>'Bạn chưa nhập nội dung',

        ]);

        $question = new Survey;
        $question -> question = $request -> question;
        $question -> user_id = Auth::user()->id;
        $question-> save();
         
        $id_ques = $question -> id;

        foreach($request->choice as $c){
            $ch = new Choice;
            $ch ->question_id = $id_ques;
            $ch ->choice = $c;
            $ch->save();
        }
        
        // for($i = 0; $i < count($request -> choice); $i++){
        //     $ch = new Choice;
        //     $ch ->question_id = $id_ques;
        //     $ch ->choice = $request->choice;
        //     $ch->save();
        // }
        // $choice = new Choice;
        // $choice ->question_id = $id_ques;
        // $choice ->choice = $request -> choice2;
        // $choice->save();

        // $choice = new Choice;
        // $choice ->question_id = $id_ques;
        // $choice ->choice = $request -> choice3;
        // $choice->save();

        // $choice = new Choice;
        // $choice ->question_id = $id_ques;
        // $choice ->choice = $request -> choice4;
        // $choice->save();
      
        
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
    
    //hiển thị biểu đồ khảo sát câu hỏi có/không
    public function displayChart($id)
    {
            
        $question = Question_YesNo::find($id);

        $countYes = Answer_YesNo::where('question_id',$id)
        ->where('answer',1)
        ->get();
         
        $yes = $countYes->count();

        $countNo = Answer_YesNo::where('question_id',$id)
        ->where('answer',0)
        ->get();
         
        $no = $countNo->count();
      
        $pie  =	 Charts::create('pie', 'highcharts')
                ->title('Biểu đồ khảo sát')
                ->labels(['Có', 'Không'])
                ->values([$yes,$no])
                ->dimensions(500,300)
                ->responsive(false);



        return view('admin.question.chart', compact('pie','question'));
           
    }

    //hiển thị biểu đồ khảo sát câu hỏi lựa chọn
    public function displayChartChoice($id){

        $question = QuestionSurvey::find($id); 

        $count = UserResponse::where('question_survey.id',$id)
        ->rightJoin('question_choice','question_choice.id','=','user_response.question_choice')
        ->join('question_survey','question_survey.id','=','question_choice.question_id')
        ->select('question_choice.choice as choice',DB::raw('COUNT(user_response.question_choice) as cnt'))
        ->groupBy('question_choice.choice')
        ->get()
       ;
        
        $question_choice = $count->pluck('choice');
        $arr = array();
        foreach( $question_choice as $q){
            array_push($arr,(string)$q);
        }   

        $cnt = $count ->pluck('cnt');


        $array = array();
        $index = 0;

        // if($cnt->isEmpty()){
        //     $array[0] = 0;
        //     $array[1] = 0;
        //     $array[2] = 0;
        //     $array[3] = 0;
        // }
        // {
           
            foreach( $cnt as $c){
                array_push($array,(int)$c);
            } 

        // }
        
        $pie  =	 Charts::create('pie', 'highcharts')
        ->title('Biểu đồ khảo sát')
        ->labels([$arr[0], $arr[1],$arr[2],$arr[3]])
        ->values([$array[0], $array[1], $array[2], $array[3]])
        ->dimensions(500,300)
        ->responsive(false);
       
        return view('admin.question.chart_choice', compact('pie','question'));

    }

}
