<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\Movie;

class MonthlyMovieDataUpdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'monthly:moviedataupdate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete column of movies table / insert movie data from TMDB';

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
        $ranking_delete = DB::table('movies')->truncate();
        $this -> getMovieData();
    }

    public function getMovieData(){
        $this -> getActionTMDB();
        $this -> getAnimationTMDB();
    }

// -------使用方法---------
// 新しいジャンルを追加するときはURLのジャンルを変更すること
// クリエイト文のジャンルを任意のものに変更すること
    public function getActionTMDB(){
        // 多すぎるので60秒間だけ保存する
        // 取得するときにURLにジャンルIDが含まれるので関数化ができない
        set_time_limit(60);
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.themoviedb.org/3/discover/movie?with_genres=28&page=1&include_video=false&include_adult=false&sort_by=popularity.desc&language=ja-JP&api_key=8317fd2cf95f8cfdab818c2176596268",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_POSTFIELDS => "{}",
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        $data = json_decode($response, true);

        for($i=1; $i<=$data['total_pages']; $i++){
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://api.themoviedb.org/3/discover/movie?with_genres=28&page=$i&include_video=false&include_adult=false&sort_by=popularity.desc&language=ja-JP&api_key=8317fd2cf95f8cfdab818c2176596268",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_POSTFIELDS => "{}",
            ));
            $response = curl_exec($curl);
            $err = curl_error($curl);
            curl_close($curl);
            $movies = json_decode($response, true);
            for ($s=0; $s <= 19; $s++) {
                if(!empty($movies['results'][$s]['overview']) && !empty($movies['results'][$s]['backdrop_path'])){
                    Movie::create([
                        'title' => $movies['results'][$s]['title'],
                        'image_path' => $movies['results'][$s]['backdrop_path'],
                        'summary' => $movies['results'][$s]['overview'],
                        'genre' => 2,
                        'TMDB_id' => $movies['results'][$s]['id'],
                    ]);
                }
            }
        }
    }

    public function getAnimationTMDB(){
        // 多すぎるので60秒間だけ保存する
        // 取得するときにURLにジャンルIDが含まれるので関数化ができない
        set_time_limit(60);
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.themoviedb.org/3/discover/movie?with_genres=16&page=1&include_video=false&include_adult=false&sort_by=popularity.desc&language=ja-JP&api_key=8317fd2cf95f8cfdab818c2176596268",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_POSTFIELDS => "{}",
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        $data = json_decode($response, true);

        for($i=1; $i<=$data['total_pages']; $i++){
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://api.themoviedb.org/3/discover/movie?with_genres=16&page=$i&include_video=false&include_adult=false&sort_by=popularity.desc&language=ja-JP&api_key=8317fd2cf95f8cfdab818c2176596268",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "GET",
                CURLOPT_POSTFIELDS => "{}",
            ));
            $response = curl_exec($curl);
            $err = curl_error($curl);
            curl_close($curl);
            $movies = json_decode($response, true);
            for ($s=0; $s <= 19; $s++) {
                if(!empty($movies['results'][$s]['overview']) && !empty($movies['results'][$s]['backdrop_path'])){
                    Movie::create([
                        'title' => $movies['results'][$s]['title'],
                        'image_path' => $movies['results'][$s]['backdrop_path'],
                        'summary' => $movies['results'][$s]['overview'],
                        'genre' => 1,
                        'TMDB_id' => $movies['results'][$s]['id'],
                    ]);
                }
            }
        }
    }

}