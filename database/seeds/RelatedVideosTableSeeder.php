<?php

use Illuminate\Database\Seeder;

class RelatedVideosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('related_videos')->insert([
            [
            'movie_id'=>'1',
            'url'=>'https://www.youtube.com/embed/o4uJHbKMpzk',
            'created_at'=>date('Y-m-d H:i:s'),
            ],
            [
            'movie_id'=>'1',
            'url'=>'https://www.youtube.com/embed/YLDxwZHRP6o',
            'created_at'=>date('Y-m-d H:i:s'),
            ],
            [
            'movie_id'=>'2',
            'url'=>'https://www.youtube.com/embed/OjWTndq1fMM',
            'created_at'=>date('Y-m-d H:i:s'),
            ],
            [
            'movie_id'=>'2',
            'url'=>'https://www.youtube.com/embed/stxs1ck8X6E',
            'created_at'=>date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
