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


Auth::routes();


Route::get('create','BlogController@create');
Route::post('postCreate','BlogController@postCreate');
Route::get('admin-posts','BlogController@adminPost');
Route::get('edit/{id}','BlogController@edit');
Route::post('postEdit','BlogController@postEdit');

Route::get('delete/{id}','BlogController@delete');

Route::get('/','BlogController@posts');
Route::get('post/{id}','BlogController@singlePost');


Route::group(['prefix'=>'admin'],function(){
	Route::get('users','AdminController@makeAuthors');
	Route::get('user/{id}','AdminController@makeAuthor');
});