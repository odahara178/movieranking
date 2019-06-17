<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use App\Ranking;

class RankingController extends Controller
{
    public function index($id){
        $genres = Config::get('genres');
        $all_ranks = $this->getAllRank($id);
        $genre_id = $id;

        return view('movie.ranking', compact('genres', 'all_ranks', 'genre_id'));
    }

// 指定ジャンルのデータのみ取得
private function getAllRank($id){
    $all_ranks = DB::table('rankings')
    ->select('rankings.genre as genre', 'rankings.rank as rank', 'movies.title as title', 'movies.id as movie_id', 'movies.image_path as image_path', 'rankings.evaluation as evaluation')
    ->join('movies','rankings.movie_id', '=', 'movies.id')
    ->where('rankings.genre', $id)
    ->where('rank', '<', 20)
    ->get();
    return $all_ranks;
}

// データ挿入用
    public function insertAllRankings(){
        $reviews = DB::table('reviews')
        ->select('movies.id as movie_id', 'movies.genre as genre', 'reviews.evaluation as evaluation')
        ->join('movies', 'reviews.movie_id', '=', 'movies.id')
        ->get();
        $evaluations = $this-> getEvaluation($reviews);
        foreach($evaluations as $rank => $evaluation) {
            Ranking::create([
                'genre' => 0,
                'rank' => $rank + 1,
                'movie_id' => $evaluation['movie_id'],
                'evaluation' => round($evaluation['average'], 1)
            ]);
        }
    }

    // ジャンルごとにDBから取得・createする
    public function insertAnimetionRankings(){
        $reviews = DB::table('reviews')
        ->select('movies.id as movie_id', 'movies.genre as genre', 'reviews.evaluation as evaluation')
        ->join('movies', 'reviews.movie_id', '=', 'movies.id')
        ->where('genre', 1)
        ->get();
        $evaluations = $this-> getEvaluation($reviews);

        foreach($evaluations as $rank => $evaluation) {
            Ranking::create([
                'genre' => 1,
                'rank' => $rank + 1,
                'movie_id' => $evaluation['movie_id'],
                'evaluation' => round($evaluation['average'], 1)
            ]);
        }
    }

    public function insertActionRankings(){
        $reviews = DB::table('reviews')
        ->select('movies.id as movie_id', 'movies.genre as genre', 'reviews.evaluation as evaluation')
        ->join('movies', 'reviews.movie_id', '=', 'movies.id')
        ->where('genre', 2)
        ->get();
        $evaluations = $this-> getEvaluation($reviews);

        foreach($evaluations as $rank => $evaluation) {
            Ranking::create([
                'genre' => 2,
                'rank' => $rank + 1,
                'movie_id' => $evaluation['movie_id'],
                'evaluation' => round($evaluation['average'], 1)
            ]);
        }
    }

    public function insertMysteryRankings(){
        $reviews = DB::table('reviews')
        ->select('movies.id as movie_id', 'movies.genre as genre', 'reviews.evaluation as evaluation')
        ->join('movies', 'reviews.movie_id', '=', 'movies.id')
        ->where('genre', 3)
        ->get();
        $evaluations = $this-> getEvaluation($reviews);

        foreach($evaluations as $rank => $evaluation) {
            Ranking::create([
                'genre' => 3,
                'rank' => $rank + 1,
                'movie_id' => $evaluation['movie_id'],
                'evaluation' => round($evaluation['average'], 1)
            ]);
        }
    }

    // 映画毎に合計評価を算出
    public function getEvaluation($reviews){

        $evaluations = [];
        foreach($reviews as $review){
            // [
            //     '映画のID' => [
            //         'レビュー合計件数(count)': 10,
            //         '合計評価件数(total_evaluation)': 40,
            //         '平均評価値(average)': 3.5,
            //     ]
            // ]
            if(isset($evaluations[$review->movie_id])){
                $evaluations[$review->movie_id]['count']++;
                $evaluations[$review->movie_id]['total_evaluation'] += $review->evaluation;
            } else {
                // データがない場合は多次元配列を作る
                $evaluations[$review->movie_id] = [];
                $evaluations[$review->movie_id]['movie_id'] = $review->movie_id;
                $evaluations[$review->movie_id]['genre'] = $review->genre;
                $evaluations[$review->movie_id]['count'] = 1;
                $evaluations[$review->movie_id]['total_evaluation'] = $review->evaluation;
            }
        }

        //  平均値の計算
        foreach($evaluations as $movie_id => $evaluation) {
            $average = $evaluation['total_evaluation'] / $evaluation['count'];
            $evaluations[$movie_id]['average'] = $average;
        }

        // 平均値の高い順にソート
        foreach($evaluations as $key => $value){
            $average_arr[$key] = $value["average"];
        }

        if (isset($average_arr)){
            array_multisort($average_arr, SORT_DESC, $evaluations);
        }

        return $evaluations;
    }

}
