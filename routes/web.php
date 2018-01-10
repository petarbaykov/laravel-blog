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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('create','BlogController@create');
Route::post('postCreate','BlogController@postCreate');
Route::get('admin-posts','BlogController@adminPost');
Route::get('edit/{id}','BlogController@edit');
Route::post('postEdit','BlogController@postEdit');

Route::get('delete/{id}','BlogController@delete');