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

// API使用テスト用
// Route::get('/test', 'TestController@getMovieData');

// お気に入り機能テスト用
// Route::get('/test', 'TestController@getMovieData');


Route::get('/home', 'HomeController@index')->name('home');

// MovieRanking Route
Route::get('/', 'MovieController@index');
Route::get('/movie/detail/{id}', 'MovieController@detail');
Route::get('/movie/search', 'MovieController@search');

Route::get('/review/{id}', 'ReviewController@index');

Route::get('/ranking/{id}', 'RankingController@index');

// ログイン済みユーザーのみ閲覧可能
Route::group(['middleware' => ['auth']], function () {
    Route::get('/mypage', 'MypageController@index');
    Route::get('mypage/myfavorite', 'MypageController@myFavorite');
    Route::post('/review/{id}', 'ReviewController@create');
    Route::post('/favorite/{id}', 'FavoriteController@store');
    Route::get('/mypage/rankingupdate', 'MypageController@rankingUpdate');
    Route::post('/mypage/rankingupdate', 'MypageController@rankingChange');
});

