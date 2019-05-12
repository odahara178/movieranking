<?php

use Illuminate\Database\Seeder;

class FavoritesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('favorites')->insert([
            [
            'movie_id'=>'1',
            'user_id'=>'1',
            'created_at'=>date('Y-m-d H:i:s'),
            ],
            [
            'movie_id'=>'2',
            'user_id'=>'1',
            'created_at'=>date('Y-m-d H:i:s'),
            ],
            [
            'movie_id'=>'3',
            'user_id'=>'1',
            'created_at'=>date('Y-m-d H:i:s'),
            ],
            [
            'movie_id'=>'4',
            'user_id'=>'2',
            'created_at'=>date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
