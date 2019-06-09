<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Recommended;

class DailyRecommendedUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'daily:recommendedUpdate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Insert recommended data';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $ranking_delete = DB::table('recommendeds')->truncate();
        $this -> createRecommended();
    }

    public function createRecommended(){
        // ※バッジ化する際はrecommendedsテーブルの全件削除を行う
    
        // 1.全ユーザーのidをRecommendedテーブルに挿入
        $users = DB::table('users')->select('id')->get();
        foreach($users as $user) {
            Recommended::create([
                'user_id' => $user->id,
            ]);
        }
        // 2.それぞれのお気に入りの総数を数える
        $membership = DB::table('users')->max('id');
        for ($person_number=1; $person_number <= $membership; $person_number++) {
    
            $favorite_number = DB::table('favorites')->where('user_id', $person_number)->count();
            $genre_total_count = 14;// (config.genre参照)
            for ($genre_number=1; $genre_number <= $genre_total_count; $genre_number++) {
        // 3.ジャンル別に計算する為、favoritesテーブルとmoviesテーブルをjoinしジャンル別に集計する
                $each_genre_number = DB::table('favorites')
                                        ->join('movies', 'favorites.movie_id', '=', 'movies.id')
                                        ->where('favorites.user_id', $person_number)
                                        ->where('movies.genre', $genre_number)
                                        ->count();
                if($favorite_number === 0 || $each_genre_number === 0) {
                    $each_genre_like_rate = 0;
                }else {
                    $each_genre_like_rate = ceil(round($each_genre_number / $favorite_number, 2) * 100);
                }
        //4.指定のユーザーの指定箇所にデータを挿入する
                DB::table('recommendeds')->where('recommendeds.user_id', $person_number)->update([$genre_number => $each_genre_like_rate]);
            }
        }
    }
}
