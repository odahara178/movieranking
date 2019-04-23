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



// MovieRanking Route
Route::get('/index', 'MovieController@index');

Route::get('/mypage', 'MovieController@mypage');

Route::get('/ranking', 'MovieController@ranking');

Route::get('/warehouse', 'MovieController@warehouse');


Route::get('/search', 'MovieController@search');

Route::get('/update', 'MovieController@update');

Route::get('/review', 'MovieController@review');


// コントローラー更新済み
Route::get('/detail', 'DetailController@index');
