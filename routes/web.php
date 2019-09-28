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

Route::get('getView','MyController@getView');


Route::group(['prefix' => 'admin'], function () {

    Route::group(['prefix' => 'user'], function () {
        Route::get('listuser','adminController@getListUser');

        Route::get('edit/{id}','adminController@getEditUser');
        Route::post('edit/{id}','adminController@postEditUser');

        Route::get('adduser','adminController@getAddUser'); 
        Route::post('adduser','adminController@postAddUser'); 
        
        Route::get('delete/{id}','adminController@deleteUser'); 
    });

    Route::group(['prefix' => 'question'], function () {

        Route::get('listquestion','adminController@getListQuestion');

        Route::get('edit/{id}','adminController@editQuestion');
        Route::post('edit/{id}','adminController@postQuestion');

        Route::get('delete/{id}','adminController@getDeleteQuestion');
        

    });

    Route::group(['prefix' => 'answer'], function () {
        Route::get('listanswer','adminController@getListAnswer');
        
        Route::get('edit/{id}','adminController@editAnswer');
        Route::post('edit/{id}','adminController@postAnswer');

        Route::get('delete/{id}','adminController@getDeleteAnswer');
    });
});


Route::get('admin/login','adminController@getAdminLogin');
Route::post('admin/login','adminController@postAdminLogin');

?>