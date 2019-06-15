<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Favorite;
use Illuminate\Support\Facades\DB;

class FavoriteController extends Controller
{
    public function store($id){
        $favorite = new Favorite();
        $favorite->movie_id = $id;
        $favorite->user_id =Auth::id();
        $favorite->save();
        return redirect()->back();
    }

    public function delete($id){
        $user_id = Auth::id();
        DB::table('favorites')->where('user_id', '=', $user_id)->where('movie_id', '=', $id)->delete();
        return redirect()->back();
    }
}
