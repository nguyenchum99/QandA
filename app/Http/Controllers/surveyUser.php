<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests;

use App\Question_YesNo;
use App\Answer_YesNo;

use App\QuestionSurvey;
use App\QuestionChoice;
use App\UserResponse;

use App\Survey;
use App\Choice;
use App\Response;

use App\User;
use Carbon\Carbon;
use DB;

use Illuminate\Support\Facades\Auth;

class surveyUser extends Controller
{
    //

    public function getSurvey(){

        Carbon::setLocale('vi');
        $list_question = DB::table('questions_yesno')
        ->select('questions_yesno.question','questions_yesno.created_at','questions_yesno.id')
        ->get();

        $ques_choice = DB::table('question_survey')
        ->select('question_survey.id','question_survey.question')
        ->get();

        $opinion= DB::table('survey')
        ->select('survey.id','survey.question')
        ->get();
       
      
        return view('home.survey.survey')->with(compact('list_question', 'ques_choice','opinion'));
    }

    public function postAnswerYesNo(Request $request,$id){

            // $check = Answer_YesNo::find(4);

            // if($check-> user_id == Auth::user()->id){
            //     return redirect('user/survey/survey_page') 
            //     -> with('thongbao','Bạn đã trả lời câu hỏi khảo sát này');
            // }
            // else{   
                $answer = new Answer_YesNo;
                $answer-> question_id = $id;        
                $answer -> user_id = Auth::user()->id;
                $answer -> answer = $request -> answer;
                $answer->save();
                return redirect('user/survey/survey_page') -> with('thongbao','Trả lời thành công');
            //}
    }


   public function getListQuestionChoice($id){
           
            $question = QuestionSurvey::find($id);

            $choice = DB::table('question_choice')
            ->join('question_survey','question_survey.id','=','question_choice.question_id')
            ->select('question_choice.choice','question_choice.id')
            ->where('question_choice.question_id',$id)
            ->get();

        return view('home.survey.list_choice',['choice'=>$choice,'question'=>$question]);

   }

   public function postChoice($id){

    $choice = new UserResponse;
    $choice -> question_choice = $id;
    $choice -> user_id = Auth::user()->id;
    $choice-> save();
    
    return redirect('user/survey/survey_page') -> with('thongbao','Trả lời thành công');
   }

 
   public function getOpinion($id){
       
        $question = Survey::find($id);

        $list = DB::table('choice')
        
        ->where('choice.question_id',$id)
        ->get();

        return view('home.survey.opinion')->with(compact('question','list'));
   }

   public function postOpinion(Request $request,$id){

        $choice = Choice::where('question_id','$id')->select('id') ->get()->toArray();
        $choice = $choice ->id;
        
        foreach($choice as $c){
            $answer = new Response;
            $answer ->question_choice = (int)$c;    
            $answer ->user_id = Auth::user()->id;
            $answer ->answer = $request->answer[(int)$c];    
            $answer->save();

          
        }

        return redirect('user/survey/survey_page') -> with('thongbao','Trả lời thành công');
   }
}
