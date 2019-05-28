<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Config;
use App\Favorite;
use Illuminate\Support\Facades\Auth;

class MovieController extends Controller
{

    public function index()
    {
        $all_ranks = $this->getAllRank();
        $animation_ranks = $this->getAnimationRank();



        return view('movie.top',compact('all_ranks', 'animation_ranks'));
    }

// ランキングデータの呼び出し
    private function getRanking(){
        $rankings = DB::table('rankings')
        ->join('movies','rankings.movie_id', '=', 'movies.id')
        ->select('rankings.genre', 'rankings.rank', 'rankings.evaluation', 'movies.title', 'movies.id');
        return $rankings;
    }

// 指定ジャンルのデータのみ取得
    private function getAllRank(){
        $all_ranks = $this->getRanking()
        ->where('rankings.genre', 0)
        ->where('rank', '<', 4)
        ->get();
        return $all_ranks;
    }

    private function getAnimationRank(){
        $animation_ranks = $this->getRanking()
        ->where('rankings.genre', 1)
        ->where('rank', '<', 4)
        ->get();
        return $animation_ranks;
    }


    public function detail($id){
        $movies = Movie::find($id);
        $genre = $this->getGenres($movies->genre);
        $urls = $this->getUrls($id);
        $review = $this->getReviews($id);
        $average = $this->getAverage($id);
        $is_favorite = $this->isFavorite($id);
        return view('movie.detail', compact('movies', 'genre', 'urls', 'review', 'average', 'is_favorite'));
    }
    
    private function isFavorite($id){
        $user_id =Auth::id();
        $favorite_count = DB::table('favorites')
        ->where('user_id', '=', $user_id)
        ->where('movie_id', '=', $id)
        ->count();

        if ($favorite_count === 1){
            return true;
        } else {
            return false;
        }
    }

    private function getAverage($id){
        // 指定のevaluationのみ取得
        $evaluation = DB::table('reviews')
        ->where('movie_id', '=', $id)
        ->select('evaluation')
        ->get();

        // evaluation合計の算出
        $total = 0;
        for ($i = 0; $i < count($evaluation); $i++) {
            $total += $evaluation[$i]->evaluation;
        }

        // レビューがない場合のエラー回避
        if(count($evaluation) == 0){
            $average = "0";
        }else{
            $average = round($total/count($evaluation));
        }
        return $average;
    }

    private function getGenres($id){
        $genres = Config::get('genres');
        $genre = $genres[$id];
        return $genre;
    }

    private function getUrls($id){
        $urls = DB::table('related_videos')
        ->where('movie_id', '=', $id)
        ->select('url')
        ->get();
        return $urls;
    }

    private function getReviews($id){
        $review = DB::table('reviews')
        ->where('movie_id', '=', $id)
        ->select('content')
        ->first();
        return $review;
    }

    public function search(Request $request)
    {
        $keyword = $request->input('keyword');
        $sort = $request->sort;

        if(!empty($keyword)){

            $movie_query = DB::table('movies')
            ->where('title', 'like', '%' . $keyword . '%')
            ->orWhere('summary', 'like', '%' . $keyword . '%');

        } else{

            $movie_query = DB::table('movies');

        }

        if ($sort) {
            $movie_query->orderBy('updated_at', $sort);
        }

        $movies = $movie_query->get();

        return view('movie.search', compact('movies', 'keyword'));
    }

}
