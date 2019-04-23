<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MovieController extends Controller
{

    public function index()
    {
        return view('movie.index');
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

    // public function detail()
    // {
    //     return view('movie.detail');
    // }

    public function search()
    {
        return view('movie.search');
    }

    public function update()
    {
        return view('movie.update');
    }

    public function review()
    {
        return view('movie.review');
    }





}
