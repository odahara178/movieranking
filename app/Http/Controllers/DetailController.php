<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\DB;

class DetailController extends Controller
{
    public function index(){
        // $id = 表示したいMovie_id
        $id = 1;
        $movies = Movie::find($id);

        // configファイルから配列を取り出す
        $genres = Config::get('genres');
        $genre = $genres[$movies->genre];
    
        $url = DB::table('related_videos')
        ->where('movie_id', '=', $id)
        ->select('url')
        ->get();


        
        return view('movie.detail', compact('movies', 'genre', 'url'));
    }





}
