<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');
        $sort = $request->sort;

        if(!empty($keyword)){

            // $movies = DB::table('movies')
            // ->where('title', 'like', '%' . $keyword . '%')
            // ->orWhere('summary', 'like', '%' . $keyword . '%')
            // ->get();

            $movie_query = DB::table('movies')
            ->where('title', 'like', '%' . $keyword . '%')
            ->orWhere('summary', 'like', '%' . $keyword . '%');

        } else{

            $movie_query = DB::table('movies');
            // $movies = DB::table('movies')->get();

        }

        if ($sort) {
            $movie_query->orderBy('updated_at', $sort);
        }

        $movies = $movie_query->get();

        return view('movie.search', compact('movies', 'keyword'));
    }
}
