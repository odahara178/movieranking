<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use Illuminate\Support\Facades\Config;

class DetailController extends Controller
{
    public function index(){
        // $id = 表示したいMovie_id
        $id = 1;
        $movies = Movie::find($id);

        // configファイルから配列を取り出す
        $genres = Config::get('genres');
        $genre = $genres[$movies->genre];


        return view('movie.detail', compact('movies','genre'));
    }





}
