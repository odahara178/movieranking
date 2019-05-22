<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class MypageController extends Controller
{
    public function index()
    {

        $user = Auth::user()
            ->join('movies as movies_1', 'movies_1.id', '=', 'users.ranking_1')
            ->join('movies as movies_2', 'movies_2.id', '=', 'users.ranking_2')
            ->join('movies as movies_3', 'movies_3.id', '=', 'users.ranking_3')
            ->select('movies_1.title as movies_1_title', 'movies_2.title as movies_2_title', 'movies_3.title as movies_3_title', 
            'movies_1.image_path as movies_1_image_path', 'movies_2.image_path as movies_2_image_path', 'movies_3.image_path as movies_3_image_path')
            ->first();
        return view('movie.mypage',compact('user'));
    }

    public function mb_strimlen($str, $start, $length, $trimmarker = '', $encoding = false) {
        $encoding = $encoding ? $encoding : mb_internal_encoding();
        $str = mb_substr($str, $start, mb_strlen($str), $encoding);
        if (mb_strlen($str, $encoding) > $length) {
            $markerlen = mb_strlen($trimmarker, $encoding);
            $str = mb_substr($str, 0, $length - $markerlen, $encoding) . $trimmarker;
        }
        return $str;
    }

    public function myFavorite(){
        $user_id = Auth::id();

        $favorites = DB::table('favorites')
        ->join('movies', 'movies.id', '=', 'favorites.movie_id')
        ->where('user_id', $user_id)
        ->select('movie_id', 'title' , 'image_path')
        ->get();


        return view('movie.warehouse', compact('favorites'));
    }

    public function rankingUpdate(){
        $user_id = Auth::id();

        $favorites = DB::table('favorites')
        ->join('movies', 'movies.id', '=', 'favorites.movie_id')
        ->where('user_id', $user_id)
        ->select('movie_id', 'title' , 'image_path')
        ->get();

        return view('movie.update', compact('favorites'));
    }









}
