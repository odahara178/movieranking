<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;

class RankingController extends Controller
{
    public function index()
    {

        $genres = Config::get('genres');

        return view('movie.ranking', compact('genres'));
    }
}
