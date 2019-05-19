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


Route::get('/search', 'SearchController@index');

Route::get('/update', 'UpdateController@index');


Route::get('/review/{id}', 'ReviewController@index');


Route::get('/ranking/{id}', 'RankingController@index');

Route::get('/movie/detail/{id}', 'MovieController@detail');



Route::group(['middleware' => ['auth']], function () {
    Route::get('/mypage', 'MypageController@index');
    Route::get('/warehouse', 'WarehouseController@index');
    Route::post('/review/{id}', 'ReviewController@create');
    Route::post('/favorite/{id}', 'FavoriteController@store');
});

