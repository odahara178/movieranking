<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use Illuminate\Support\Facades\Config;
use App\Utils\CustomConfig;
use Illuminate\Support\Facades\DB;

class DetailController extends Controller
{

    
    
    public function index($id){
        // $id = 表示したいMovie_id
        $movies = Movie::find($id);
        $genre = $this->getGenres($movies->genre);  
        $urls = $this->getUrls($id);
        $review = $this->getReviews($id);
        return view('movie.detail', compact('movies', 'genre', 'urls', 'review'));
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
