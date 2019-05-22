<?php

use Illuminate\Database\Seeder;

class RankingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    DB::table('rankings')->insert([
        [
        'genre'=>'0',
        'rank'=>'1',
        'movie_id'=>'1',
        'evaluation'=>'4.8',
        'created_at'=>date('Y-m-d H:i:s'),
        ],
        [
        'genre'=>'0',
        'rank'=>'2',
        'movie_id'=>'2',
        'evaluation'=>'4.3',
        'created_at'=>date('Y-m-d H:i:s'),
        ],
        [
        'genre'=>'0',
        'rank'=>'3',
        'movie_id'=>'3',
        'evaluation'=>'3.8',
        'created_at'=>date('Y-m-d H:i:s'),
        ],
        [
        'genre'=>'1',
        'rank'=>'1',
        'movie_id'=>'2',
        'evaluation'=>'4.8',
        'created_at'=>date('Y-m-d H:i:s'),
        ],
        [
        'genre'=>'1',
        'rank'=>'2',
        'movie_id'=>'3',
        'evaluation'=>'4.3',
        'created_at'=>date('Y-m-d H:i:s'),
        ],
        [
        'genre'=>'1',
        'rank'=>'3',
        'movie_id'=>'7',
        'evaluation'=>'3.8',
        'created_at'=>date('Y-m-d H:i:s'),
        ],
        [
        'genre'=>'2',
        'rank'=>'1',
        'movie_id'=>'4',
        'evaluation'=>'4.8',
        'created_at'=>date('Y-m-d H:i:s'),
        ],
        [
        'genre'=>'2',
        'rank'=>'2',
        'movie_id'=>'5',
        'evaluation'=>'4.8',
        'created_at'=>date('Y-m-d H:i:s'),
        ],
        [
        'genre'=>'2',
        'rank'=>'3',
        'movie_id'=>'10',
        'evaluation'=>'4.8',
        'created_at'=>date('Y-m-d H:i:s'),
        ],
    ]);
    }
}
