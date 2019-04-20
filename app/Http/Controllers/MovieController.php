<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MovieController extends Controller
{

    public function index()
    {
        return view('');
    }






    public function mypage()
    {
        return view('movie.mypage');
    }

    public function ranking()
    {
        return view('movie.ranking');
    }

    public function warehouse()
    {
        return view('movie.warehouse');
    }

    public function detail()
    {
        return view('movie.detail');
    }






}
