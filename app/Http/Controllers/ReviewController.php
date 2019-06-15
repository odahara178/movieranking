<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Review;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ReviewController extends Controller
{
    public function index($id)
    {

        $reviews = DB::table('reviews')
        ->join('users', 'reviews.user_id', '=', 'users.id')
        ->where('movie_id', $id)
        ->select('name','content','evaluation')
        ->get();

        return view('movie.review', compact('reviews'));
    }

    public function create(Request $request, $id){

        $validatedData = $request->validate([
            'content' => 'required',
        ]);

        $review = new Review();
        $review->content = $request->content;
        $review->movie_id = $id;
        $review->user_id = Auth::id();
        $review->evaluation = $request->evaluation;
        $review->save();

        return redirect()->back()->withInput();
    }


}
