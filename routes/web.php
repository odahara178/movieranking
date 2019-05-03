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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');



// MovieRanking Route
Route::get('/', 'MovieController@index');

Route::get('/ranking', 'RankingController@index');

Route::get('/search', 'SearchController@index');

Route::get('/update', 'UpdateController@index');

Route::get('/review', 'ReviewController@index');

Route::get('/detail', 'DetailController@index');

Route::group(['middleware' => ['auth']], function () {
    // この中はログインされている場合のみルーティングされる
    Route::get('/mypage', 'MypageController@index');
    Route::get('/warehouse', 'WarehouseController@index');
});