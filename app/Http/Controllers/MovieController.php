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
        $action_ranks = $this->getActionRank();
        $mystery_ranks = $this->getMysteryRank();



        return view('movie.top',compact('all_ranks', 'animation_ranks', 'action_ranks', 'mystery_ranks'));
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

    private function getActionRank(){
        $animation_ranks = $this->getRanking()
        ->where('rankings.genre', 2)
        ->where('rank', '<', 4)
        ->get();
        return $animation_ranks;
    }

    private function getMysteryRank(){
        $animation_ranks = $this->getRanking()
        ->where('rankings.genre', 3)
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

        $related_movies = $this->relatedMovies($id);
        $related_movies_array = $this->getRelatedMoviesId($related_movies);

        // $related_movies_array = $this->isRelatedMovie($related_movies);
        // $popularity_movies = $this->getPopularityMovies();
        
        return view('movie.detail', compact('movies', 'genre', 'urls', 'review', 'average', 'is_favorite', 'related_movies', 'related_movies_array'));
    }

    private function relatedMovies($id){
        $TMDB_id = DB::table('movies')->where('id', '=', $id)->first();
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => "https://api.themoviedb.org/3/movie/$TMDB_id->TMDB_id/recommendations?page=1&language=ja-JP&api_key=8317fd2cf95f8cfdab818c2176596268",
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => "",
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 30,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => "GET",
          CURLOPT_POSTFIELDS => "{}",
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
          echo "cURL Error #:" . $err;
        }
            $related_movies = json_decode($response, true);

        return $related_movies;
    }

    private function getRelatedMoviesId($related_movies){
        
        if ($related_movies['total_results'] >= 4) {
            $count = 4;
        } else {
            $count = $related_movies['total_results'];
        }
            $related_movies_array =[];
            for ($i=0; $i < $count; $i++) {
                $related_movies_id = DB::table('movies')->where('TMDB_id', '=', $related_movies['results'][$i]['id'])->first();
                // DBに保存されていない場合はnullを返します。（ブラウザ上はid11に飛びます。）
                if(isset($related_movies_id)){
                    $movie_data_id = $related_movies_id->id;
                } else{
                    $movie_data_id = 11;
                }
                array_push($related_movies_array, $movie_data_id);
            }
        return $related_movies_array;
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
        $movies = $movie_query->paginate(5);
        return view('movie.search', compact('movies', 'keyword'));
    }

}
