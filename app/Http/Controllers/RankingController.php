<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;
use App\Ranking;

class RankingController extends Controller
{
    public function index()
    {
        $genres = Config::get('genres');

        $this -> insertAllRankings();
        $this -> insertAnimetionRankings();
        $this -> insertActionRankings();
        $this -> insertMysteryRankings();

        return view('movie.ranking', compact('genres'));
    }

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

// 配列が空だったとき用の関数作成するⅡ


// 映画毎に合計評価を算出
    public function getEvaluation($reviews){

        // 配列が空だったらリターンNULLⅠ


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

// エラー回避（考え中）
        // foreach($evaluations as $movie_id => $evaluation) {
        //     if(count($evaluation['total_evaluation']) == 0){
        //         $average = "0";
        //     }else{
        //         $average = $evaluation['total_evaluation'] / $evaluation['count'];
        //         $evaluations[$movie_id]['average'] = $average;
        //     }
        // }

        //  平均値の計算
        foreach($evaluations as $movie_id => $evaluation) {
            $average = $evaluation['total_evaluation'] / $evaluation['count'];
            $evaluations[$movie_id]['average'] = $average;
        }

        // 平均値の高い順にソート
        foreach($evaluations as $key => $value){
            $average_arr[$key] = $value["average"];
        }
        array_multisort($average_arr, SORT_DESC, $evaluations);

        return $evaluations;
    }

}
