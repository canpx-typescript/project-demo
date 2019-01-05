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

Route::get('/',['as'=>'index','uses'=>'HomeController@index']);
Route::get('login',['as'=>'getLogin','uses'=>'AuthenticationController@getLogin']);
Route::post('login',['as'=>'postLogin','uses'=>'AuthenticationController@postLogin']);
Route::get('addUser',['as'=>'addUser','uses'=>'AuthenticationController@addUser']);
Route::post('addUser',['as'=>'addUser','uses'=>'AuthenticationController@postAddUser']);
Route::get('logout',['as'=>'logout','uses'=>'AuthenticationController@logout']);
Route::group(['prefix'=>'admin'],function (){
    Route::group(['prefix' => 'cate'],function (){
        Route::get('add',['as'=>'admin.cate.getAdd','uses'=>'CatesController@getAdd']);
        Route::post('add',['as'=>'admin.cate.postAdd','uses'=>'CatesController@postAdd']);
        Route::get('list',['as'=>'admin.cate.getList','uses'=>'CatesController@getList']);
        Route::get('delete/{id}',['as'=>'admin.cate.getDelete','uses'=>'CatesController@getDelete']);
        Route::get('edit/{id}',['as'=>'admin.cate.getEdit','uses'=>'CatesController@getEdit']);
        Route::post('edit/{id}',['as'=>'admin.cate.postEdit','uses'=>'CatesController@postEdit']);
    });
    Route::group(['prefix' => 'product'],function (){
        Route::get('add',['as'=>'admin.product.getAdd','uses'=>'ProductController@getAdd']);
        Route::post('add',['as'=>'admin.product.postAdd','uses'=>'ProductController@postAdd']);
        Route::get('list',['as'=>'admin.cate.getList','uses'=>'ProductController@getList']);
        Route::get('delete/{id}',['as'=>'admin.cate.getDelete','uses'=>'ProductController@getDelete']);
        Route::get('edit/{id}',['as'=>'admin.cate.getEdit','uses'=>'ProductController@getEdit']);
        Route::post('edit/{id}',['as'=>'admin.cate.postEdit','uses'=>'ProductController@postEdit']);
    });
});