<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('getview','MyController@getView');


Route::group(['prefix' => 'admin','middleware'=> 'adminLogin'], function () {
    Route::get('profile', 'manageUserController@profile');
    Route::post('profile', 'manageUserController@update_avatar');

    Route::group(['prefix' => 'user'], function () {
        Route::get('listuser','manageUserController@getListUser');

        Route::get('edit/{id}','manageUserController@getEditUser');
        Route::post('edit/{id}','manageUserController@postEditUser');

        Route::get('adduser','manageUserController@getAddUser'); 
        Route::post('adduser','manageUserController@postAddUser'); 
        
        Route::get('delete/{id}', 'manageUserController@deleteUser'); 
        
    });

    Route::group(['prefix' => 'session'], function () {
        Route::get('list_session','manageSessionController@getListSession');

        Route::get('delete_session/{id}','manageSessionController@deleteSession'); 

        Route::get('add_session','manageSessionController@getAddSession'); 
        Route::post('add_session','manageSessionController@postAddSession');

        Route::get('edit/{id}','manageSessionController@getEditSession');
        Route::post('edit/{id}','manageSessionController@postEditSession');

        Route::get('add_question/{id}','manageSessionController@getAddQuestion'); 
        Route::post('add_question/{id}','manageSessionController@postAddQuestion');

        Route::post('open_close/{id}','manageSessionController@postSession');

    });

    Route::group(['prefix' => 'question'], function () {

        Route::get('listquestion','manageQuestionController@getListQuestion');

        Route::get('edit/{id}','manageQuestionController@editQuestion');
        Route::post('edit/{id}','manageQuestionController@postQuestion');

        Route::get('delete/{id}','manageQuestionController@getDeleteQuestion');

        Route::get('add_answer/{id}','manageAnswerController@getAddAnswer'); 
        Route::post('add_answer/{id}','manageAnswerController@postAddAnswer');

        Route::get('add_survey','manageSurveyController@getAddSurvey');
        Route::get('list_survey','manageSurveyController@getListSurveyYesNo');
        
        Route::post('add_ques_yesno','manageSurveyController@postAddQuestionYesNo');

        Route::post('add_ques_choice','manageSurveyController@postAddQuestionChoice');

        Route::get('delete_yesno/{id}','manageSurveyController@deleteYesNo');


        Route::get('edit_yesno/{id}','manageSurveyController@getEditYesNo');
        Route::post('edit_yesno/{id}','manageSurveyController@postEditYesNo');


        Route::get('layout_opinion','manageSurveyController@getLayoutOpinion');
        Route::post('layout_opinion','manageSurveyController@postNumber');

        Route::post('create_opinion','manageSurveyController@postCreateOpinion');

        Route::post('add_ques','manageSurveyController@postQuestionAnswer');


        Route::get('chart/{id}','manageSurveyController@displayChart');
        Route::get('chart_choice/{id}','manageSurveyController@displayChartChoice');

        Route::get('ques_answ/{id}','manageSurveyController@getListQuestionAnswer');
        Route::get('delete_ques/{id}','manageSurveyController@deleteQuestion');


    });



    Route::group(['prefix' => 'answer'], function () {
        Route::get('listanswer','manageAnswerController@getListAnswer');
        
        Route::get('edit/{id}','manageAnswerController@editAnswer');
        Route::post('edit/{id}','manageAnswerController@postAnswer');

        Route::get('delete/{id}','manageAnswerController@getDeleteAnswer');
    });

 
});



Route::get('admin/login','adminController@getAdminLogin');
Route::post('admin/login','adminController@postAdminLogin');
Route::get('admin/logout','adminController@adminLogout');



Route::get('user/login','userController@getUserLogin');
Route::post('user/login','userController@postUserLogin');
Route::get('user/logout','userController@userLogout');

Route::get('user/register','userController@getUserRegister');
Route::post('user/register','userController@postUserRegister');


Route::group(['prefix' => 'user','middleware'=> 'userLogin'], function () {
    Route::get('profile', 'userController@profile');
    Route::post('profile', 'userController@update_avatar');

    Route::group(['prefix' => 'page'], function () {
        Route::get('info/{id}','pageController@getInfo');

        Route::get('edit/{id}','pageController@getEdit');
        Route::post('edit/{id}','pageController@postEdit');

        Route::get('listquestion','pageController@getListQuestion');

        Route::get('question_answer/{id}','pageController@getListQuestionAnswer');

    });

    Route::group(['prefix' => 'session'], function () {
        
        Route::get('list_session_close','sessionController@getListSession');
        Route::get('list_session_active','sessionController@getListSessionActive');

        Route::post('check_password/{id}','sessionController@checkPasswordSession');
        Route::get('list_question_active/{id}','sessionController@getListQuestionActive');


        Route::get('list_question/{id}','sessionController@getListQuestionOnSession');

        Route::get('create_answer/{id}','sessionController@getCreateAnswer');
        Route::post('create_answer/{id}','sessionController@postCreateAnswer');

      
        Route::post('create_question/{id}','sessionController@postCreateQuestionOnSession');
        
        
    });

    Route::group(['prefix' => 'manage'], function () {
        
        Route::get('createsession','createSessionUser@getCreateSession');
        Route::post('createsession','createSessionUser@postCreateSession');

        Route::get('create_question/{id}','createSessionUser@getCreateQuestionOnSession');
        Route::post('create_question/{id}','createSessionUser@postCreateQuestionOnSession');

        Route::get('list/{id}','createSessionUser@getListSession');

        Route::get('edit/{id}','createSessionUser@getEditSession');
        Route::post('edit/{id}','createSessionUser@postEditSession');

        Route::get('delete/{id}','createSessionUser@deleteSession');

        Route::post('open_close/{id}','createSessionUser@postSessionUser');

        
    });

    Route::group(['prefix' => 'survey'], function () {

        Route::get('survey_page','surveyUser@getSurvey');

        Route::post('yes_no/{id}','surveyUser@postAnswerYesNo');

        Route::get('list_choice/{id}','surveyUser@getListQuestionChoice');

        Route::post('choice','surveyUser@postChoice');

        Route::get('list_opinion/{id}','surveyUser@getOpinion');
        Route::post('opinion/{id}','surveyUser@postOpinion');

        Route::post('answer/{id}','surveyUser@postAnswer');
    });

});


Route::get('search_user',[
    'as'=>'search_user',
    'uses'=>'manageUserController@getSearch_user'
]);

Route::get('search_question',[
    'as'=>'search_question',
    'uses'=>'manageQuestionController@getSearchQuestion'
]);

Route::get('search_session',[
    'as'=>'search_session',
    'uses'=>'manageSessionController@getSearchSession'
]);

Route::get('search_answer',[
    'as'=>'search_answer',
    'uses'=>'manageAnswerController@getSearchAnswer'
]);





Route::get('/x',function(){
    foreach(Auth::user()->unreadNotifications as $notification){
        $notification->markAsRead();
    }
});



use App\Notifications\Answer;
use Carbon\Carbon;
use App\User;

Route::get('/', function () {
   
    $user = user::find(1);
    User::find(1)->notify(new Answer);
    // Notification::route('mail','abc@gmail.com')->notify(new Answer($user));

    return view('welcome');
    
});

?>