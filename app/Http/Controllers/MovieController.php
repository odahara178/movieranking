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
        return view('movie.top');
    }

    public function detail($id){
        // $id = 表示したいMovie_id
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

}
