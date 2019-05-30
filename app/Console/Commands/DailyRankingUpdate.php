<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Ranking;
use Illuminate\Support\Facades\DB;

class DailyRankingUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'daily:rankingUpdate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete column of rankings table / insert movie data with high evaluation';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        // Rankingテーブルの削除
        $ranking_delete = DB::table('rankings')->truncate();

        // Rankingテーブルにデータ挿入
        $this -> insertAllRankings();
        $this -> insertAnimetionRankings();
        $this -> insertActionRankings();
        $this -> insertMysteryRankings();
        $this -> insertSuspenseRankings();
        $this -> insertHorrorRankings();
        $this -> insertFantasyRankings();
        $this -> insertSFRankings();
        $this -> insertDramaRankings();
        $this -> insertDocumentaryRankings();
        $this -> insertWarRankings();
        $this -> inserCrimeRankings();
        $this -> insertComedyRankings();
        $this -> insertSportsRankings();
        $this -> insertLoveRankings();
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

    public function insertSuspenseRankings(){
        $reviews = DB::table('reviews')
        ->select('movies.id as movie_id', 'movies.genre as genre', 'reviews.evaluation as evaluation')
        ->join('movies', 'reviews.movie_id', '=', 'movies.id')
        ->where('genre', 4)
        ->get();
        $evaluations = $this-> getEvaluation($reviews);

        foreach($evaluations as $rank => $evaluation) {
            Ranking::create([
                'genre' => 4,
                'rank' => $rank + 1,
                'movie_id' => $evaluation['movie_id'],
                'evaluation' => round($evaluation['average'], 1)
            ]);
        }
    }

    public function insertHorrorRankings(){
        $reviews = DB::table('reviews')
        ->select('movies.id as movie_id', 'movies.genre as genre', 'reviews.evaluation as evaluation')
        ->join('movies', 'reviews.movie_id', '=', 'movies.id')
        ->where('genre', 5)
        ->get();
        $evaluations = $this-> getEvaluation($reviews);

        foreach($evaluations as $rank => $evaluation) {
            Ranking::create([
                'genre' => 5,
                'rank' => $rank + 1,
                'movie_id' => $evaluation['movie_id'],
                'evaluation' => round($evaluation['average'], 1)
            ]);
        }
    }

    public function insertFantasyRankings(){
        $reviews = DB::table('reviews')
        ->select('movies.id as movie_id', 'movies.genre as genre', 'reviews.evaluation as evaluation')
        ->join('movies', 'reviews.movie_id', '=', 'movies.id')
        ->where('genre', 6)
        ->get();
        $evaluations = $this-> getEvaluation($reviews);

        foreach($evaluations as $rank => $evaluation) {
            Ranking::create([
                'genre' => 6,
                'rank' => $rank + 1,
                'movie_id' => $evaluation['movie_id'],
                'evaluation' => round($evaluation['average'], 1)
            ]);
        }
    }

    public function insertSFRankings(){
        $reviews = DB::table('reviews')
        ->select('movies.id as movie_id', 'movies.genre as genre', 'reviews.evaluation as evaluation')
        ->join('movies', 'reviews.movie_id', '=', 'movies.id')
        ->where('genre', 7)
        ->get();
        $evaluations = $this-> getEvaluation($reviews);

        foreach($evaluations as $rank => $evaluation) {
            Ranking::create([
                'genre' => 7,
                'rank' => $rank + 1,
                'movie_id' => $evaluation['movie_id'],
                'evaluation' => round($evaluation['average'], 1)
            ]);
        }
    }

    public function insertDramaRankings(){
        $reviews = DB::table('reviews')
        ->select('movies.id as movie_id', 'movies.genre as genre', 'reviews.evaluation as evaluation')
        ->join('movies', 'reviews.movie_id', '=', 'movies.id')
        ->where('genre', 8)
        ->get();
        $evaluations = $this-> getEvaluation($reviews);

        foreach($evaluations as $rank => $evaluation) {
            Ranking::create([
                'genre' => 8,
                'rank' => $rank + 1,
                'movie_id' => $evaluation['movie_id'],
                'evaluation' => round($evaluation['average'], 1)
            ]);
        }
    }

    public function insertDocumentaryRankings(){
        $reviews = DB::table('reviews')
        ->select('movies.id as movie_id', 'movies.genre as genre', 'reviews.evaluation as evaluation')
        ->join('movies', 'reviews.movie_id', '=', 'movies.id')
        ->where('genre', 9)
        ->get();
        $evaluations = $this-> getEvaluation($reviews);

        foreach($evaluations as $rank => $evaluation) {
            Ranking::create([
                'genre' => 9,
                'rank' => $rank + 1,
                'movie_id' => $evaluation['movie_id'],
                'evaluation' => round($evaluation['average'], 1)
            ]);
        }
    }

    public function insertWarRankings(){
        $reviews = DB::table('reviews')
        ->select('movies.id as movie_id', 'movies.genre as genre', 'reviews.evaluation as evaluation')
        ->join('movies', 'reviews.movie_id', '=', 'movies.id')
        ->where('genre', 10)
        ->get();
        $evaluations = $this-> getEvaluation($reviews);

        foreach($evaluations as $rank => $evaluation) {
            Ranking::create([
                'genre' => 10,
                'rank' => $rank + 1,
                'movie_id' => $evaluation['movie_id'],
                'evaluation' => round($evaluation['average'], 1)
            ]);
        }
    }
    public function inserCrimeRankings(){
        $reviews = DB::table('reviews')
        ->select('movies.id as movie_id', 'movies.genre as genre', 'reviews.evaluation as evaluation')
        ->join('movies', 'reviews.movie_id', '=', 'movies.id')
        ->where('genre', 11)
        ->get();
        $evaluations = $this-> getEvaluation($reviews);

        foreach($evaluations as $rank => $evaluation) {
            Ranking::create([
                'genre' => 11,
                'rank' => $rank + 1,
                'movie_id' => $evaluation['movie_id'],
                'evaluation' => round($evaluation['average'], 1)
            ]);
        }
    }

    public function insertComedyRankings(){
        $reviews = DB::table('reviews')
        ->select('movies.id as movie_id', 'movies.genre as genre', 'reviews.evaluation as evaluation')
        ->join('movies', 'reviews.movie_id', '=', 'movies.id')
        ->where('genre', 12)
        ->get();
        $evaluations = $this-> getEvaluation($reviews);

        foreach($evaluations as $rank => $evaluation) {
            Ranking::create([
                'genre' => 12,
                'rank' => $rank + 1,
                'movie_id' => $evaluation['movie_id'],
                'evaluation' => round($evaluation['average'], 1)
            ]);
        }
    }

    public function insertSportsRankings(){
        $reviews = DB::table('reviews')
        ->select('movies.id as movie_id', 'movies.genre as genre', 'reviews.evaluation as evaluation')
        ->join('movies', 'reviews.movie_id', '=', 'movies.id')
        ->where('genre', 13)
        ->get();
        $evaluations = $this-> getEvaluation($reviews);

        foreach($evaluations as $rank => $evaluation) {
            Ranking::create([
                'genre' => 13,
                'rank' => $rank + 1,
                'movie_id' => $evaluation['movie_id'],
                'evaluation' => round($evaluation['average'], 1)
            ]);
        }
    }

    public function insertLoveRankings(){
        $reviews = DB::table('reviews')
        ->select('movies.id as movie_id', 'movies.genre as genre', 'reviews.evaluation as evaluation')
        ->join('movies', 'reviews.movie_id', '=', 'movies.id')
        ->where('genre', 14)
        ->get();
        $evaluations = $this-> getEvaluation($reviews);

        foreach($evaluations as $rank => $evaluation) {
            Ranking::create([
                'genre' => 14,
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

        // レビューがない（ランキングが取得できない）場合のエラー回避
        if (isset($average_arr)){
            array_multisort($average_arr, SORT_DESC, $evaluations);
        }
        return $evaluations;
    }

}
