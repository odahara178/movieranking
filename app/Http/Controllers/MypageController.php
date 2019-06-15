<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class MypageController extends Controller
{
    public function index(){
        $user = $this->getMyranking();
        if(isset($user)){
            $recommended_movies = $this->searchRecommended();
            $count_recommended_movies = $this->judgeCountMovie($recommended_movies);
        } else{
            $recommended_movies = "オススメはありません";
            $count_recommended_movies = "オススメはありません";
        }
        return view('movie.mypage',compact('user', 'recommended_movies', 'count_recommended_movies'));
    }

    public function getMyranking(){
        $user_id = Auth::id();
        $user = Auth::user()
        ->join('movies as movies_1', 'movies_1.id', '=', 'users.ranking_1')
        ->join('movies as movies_2', 'movies_2.id', '=', 'users.ranking_2')
        ->join('movies as movies_3', 'movies_3.id', '=', 'users.ranking_3')
        ->where('users.id', '=', $user_id)
        ->select('movies_1.title as movies_1_title', 'movies_2.title as movies_2_title', 'movies_3.title as movies_3_title', 
        'movies_1.image_path as movies_1_image_path', 'movies_2.image_path as movies_2_image_path', 'movies_3.image_path as movies_3_image_path', 'movies_1.id as movies_1_id', 'movies_2.id as movies_2_id', 'movies_3.id as movies_3_id')
        ->first();
        return $user;
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

        $my_ranking = $this->getMyranking();
        return view('movie.update', compact('favorites', 'my_ranking'));
    }

    public function rankingChange(Request $request){
        $ranking_data = $request->all();
        $user_id = Auth::id();
        // 1.取得したリクエストを使用しuserテーブルのrankingカラムを更新する
        DB::table('users')->where('id', $user_id)->update(['ranking_1' => $ranking_data['movie_id_1'], 'ranking_2' => $ranking_data['movie_id_2'], 'ranking_3' => $ranking_data['movie_id_3']]);
        return redirect()->back()->withInput();
    }

    public function searchRecommended(){

        // 1. マッチ度が近いユーザーIDを取得
        $match_id = $this->getMostMatchId();

        // 2. マッチ度が近いユーザーのお気に入りを取得
        // 3. 自分がお気に入りにしているデータ以外を取得
        $match_favorites = $this->getMostMatchFavorite($match_id);

        // 4.映画の情報を取得
        $recommended_movies = $this->getMovieData($match_favorites);

        return $recommended_movies;
    }
    
    private function getMostMatchId(){
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

    private function getMostMatchFavorite($match_id){
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

    private function judgeCountMovie($recommended_movies){
        $count_recommended_movies = count($recommended_movies);
        if($count_recommended_movies > 4){
            $count_recommended_movies = 4;
        }
        return $count_recommended_movies;
    }

}
