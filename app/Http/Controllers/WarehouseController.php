<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    public function index()
    {
        $user_id = Auth::id();

        $favorites = DB::table('favorites')
        ->join('movies', 'movies.id', '=', 'favorites.movie_id')
        ->where('user_id', $user_id)
        ->select('movie_id', 'title' , 'image_path')
        ->get();


        return view('movie.warehouse', compact('favorites'));
    }
}
