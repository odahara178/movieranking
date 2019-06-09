<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;

use Illuminate\Support\Facades\DB;
use App\Recommended;
use Illuminate\Support\Facades\Auth;

class TestController extends Controller
{
    public function searchRecommended(){

    // 1. マッチ度が近いユーザーIDを取得
    $match_id = $this->getMostMatchId();

    // 2. マッチ度が近いユーザーのお気に入りを取得
    // 3. 自分がお気に入りにしているデータ以外を取得
    $match_favorites = $this->getMostMatchFavorite($match_id);

    // 4.映画の情報を取得
    $recommended_movies = $this->getMovieData($match_favorites);
dd($recommended_movies[1]->title);
    // return view('movie.mypage', compact('recommended_movies'));
    }

    private function getMostMatchId() {
        $logged_in_user_id = Auth::id();

        // 自分のデータを取得する。
        $my_recommended_data = DB::table('recommendeds')->where('user_id', $logged_in_user_id)->first();

        // 一番お気に入りしているカラムを取得
        $max_col = 1;
        for ($i=2; $i <= 14 ; $i++) {
            if ($my_recommended_data->$max_col < $my_recommended_data->$i) {
                $max_col = $i;
            }
        }

        // お気に入り度を取得
        $max_value = $my_recommended_data->$max_col;

        // マッチするデータを取得
        for ($i=5; $i <= 100; $i += 5) {
            $match_data = DB::table('recommendeds')
                        ->where('user_id', '!=', $logged_in_user_id)
                        ->where($max_col, '>=', $max_value - $i)
                        ->where($max_col, '<=', $max_value + $i)
                        ->first();
            if (isset($match_data)) {
                return $match_data->user_id;
            }
        }
    }

    private function getMostMatchFavorite($match_id) {
        $logged_in_user_id = Auth::id();
        $most_match_query = DB::table('favorites')->where('user_id', $match_id);

        $my_favorites = DB::table('favorites')->where('user_id', $logged_in_user_id)->get();
        // 自分がお気に入りにしていない映画を取得
        foreach($my_favorites as $my_favorite) {
            $most_match_query->where('movie_id', '!=', $my_favorite->movie_id);
        }
        $most_match_favorites = $most_match_query->get();
        return $most_match_favorites;
    }

    private function getMovieData($match_favorites){
        $movie_number = count($match_favorites);
        $recommended_movie_query = DB::table('movies');

        for ($i=0; $i < $movie_number; $i++) {
            $recommended_movie_query->orWhere('id', '=', $match_favorites[$i]->movie_id);
        }

        $recommended_movies = $recommended_movie_query->get();
        return $recommended_movies;
    }









}

