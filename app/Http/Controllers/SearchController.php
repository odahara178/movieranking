<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->input('keyword');

        if(!empty($keyword)){           

            $movies = DB::table('movies')
            ->where('title', 'like', '%' . $keyword . '%')
            ->orWhere('summary', 'like', '%' . $keyword . '%')
            ->get();           

        } else{           

            $movies = DB::table('movies')->get();       

        }
   
        return view('movie.search', compact('movies', 'keyword'));
    }
}
