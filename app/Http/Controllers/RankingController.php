<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class RankingController extends Controller
{
    public function index($id)
    {
        $genres = Config::get('genres');

        $reviews = DB::table('reviews')
        ->get();

        $evaluations = [];
        foreach($reviews as $review){
        
            if(isset($evaluations[$review->movie_id])){

                $evaluations[$review->movie_id]['count']++;
                $evaluations[$review->movie_id]['total_evaluation'] += $review->evaluation; 

            } else {
                $evaluations[$review->movie_id] = [];
                $evaluations[$review->movie_id]['count'] = 1;
                $evaluations[$review->movie_id]['total_evaluation'] = $review->evaluation;
            }
        
        }

        // ['key' => 'value']

        foreach($evaluations as $movie_id => $evaluation) {
            $average = $evaluation['total_evaluation'] / $evaluation['count'];
            $evaluations[$movie_id]['average'] = $average;
        }

        dd($evaluations);


        return view('movie.ranking', compact('genres'));
    }
}
