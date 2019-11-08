<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Requests;

use App\Question_YesNo;
use App\Answer_YesNo;
use App\User;
use Carbon\Carbon;
use DB;

use Illuminate\Support\Facades\Auth;

class surveyUser extends Controller
{
    //

    public function getSurvey(){
        Carbon::setLocale('vi');
        $question['list_question'] = DB::table('questions_yesno')
        ->select('questions_yesno.question','questions_yesno.created_at','questions_yesno.id')
        ->get();

        return view('home.survey.survey',$question);
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
}
