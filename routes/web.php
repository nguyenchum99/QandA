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

        Route::get('list_question_active/{id}','sessionController@getListQuestionActive');

        Route::get('list_question/{id}','sessionController@getListQuestionOnSession');

        Route::get('create_answer/{id}','sessionController@getCreateAnswer');
        Route::post('create_answer/{id}','sessionController@postCreateAnswer');

        Route::get('create_question/{id}','sessionController@getCreateQuestionOnSession');
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


});


Route::get('user/home','userController@getview');


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


Route::get('user/profile', 'userController@profile');
Route::post('user/profile', 'userController@update_avatar');

Route::get('admin/profile', 'manageUserController@profile');
Route::post('admin/profile', 'manageUserController@update_avatar');


Route::get('/x',function(){
    foreach(Auth::user()->unreadNotifications as $notification){
        $notification->markAsRead();
    }
});

?>