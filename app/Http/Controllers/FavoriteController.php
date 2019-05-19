<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Favorite;

class FavoriteController extends Controller
{
    public function store($id){
        $favorite = new Favorite();
        $favorite->movie_id = $id;
        $favorite->user_id =Auth::id();
        $favorite->save();

        return redirect()->back();
    }
}
