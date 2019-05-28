<?php

use Illuminate\Database\Seeder;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('reviews')->insert([
            [
            'movie_id'=>'1',
            'user_id'=>'1',
            'evaluation'=>'5',
            'content'=>'映像も、音楽も物語もとにかく綺麗な作品でした。',
            'created_at'=>date('Y-m-d H:i:s'),
            ],
            [
            'movie_id'=>'1',
            'user_id'=>'2',
            'evaluation'=>'2',
            'content'=>'昇華しきれてないと言うか、描ききれていない感が残った。',
            'created_at'=>date('Y-m-d H:i:s'),
            ],
            [
            'movie_id'=>'1',
            'user_id'=>'3',
            'evaluation'=>'4',
            'content'=>'眺めるだけでうっとりするような映像はさすが新海さん。',
            'created_at'=>date('Y-m-d H:i:s'),
            ],
            [
            'movie_id'=>'2',
            'user_id'=>'1',
            'evaluation'=>'3',
            'content'=>'作りは王道のアメコミ。カーチェイスをはじめとしたアクションシーンはスピード感もあって楽しめました。',
            'created_at'=>date('Y-m-d H:i:s'),
            ],
            [
            'movie_id'=>'2',
            'user_id'=>'1',
            'evaluation'=>'3',
            'content'=>'このテキストは仮です。',
            'created_at'=>date('Y-m-d H:i:s'),
            ],
            [
            'movie_id'=>'3',
            'user_id'=>'1',
            'evaluation'=>'3',
            'content'=>'このテキストは仮です。',
            'created_at'=>date('Y-m-d H:i:s'),
            ],
            [
            'movie_id'=>'4',
            'user_id'=>'1',
            'evaluation'=>'3',
            'content'=>'このテキストは仮です。',
            'created_at'=>date('Y-m-d H:i:s'),
            ],
            [
            'movie_id'=>'5',
            'user_id'=>'1',
            'evaluation'=>'3',
            'content'=>'このテキストは仮です。',
            'created_at'=>date('Y-m-d H:i:s'),
            ],
            [
            'movie_id'=>'6',
            'user_id'=>'1',
            'evaluation'=>'3',
            'content'=>'このテキストは仮です。',
            'created_at'=>date('Y-m-d H:i:s'),
            ],
            [
            'movie_id'=>'7',
            'user_id'=>'1',
            'evaluation'=>'3',
            'content'=>'このテキストは仮です。',
            'created_at'=>date('Y-m-d H:i:s'),
            ],
            [
            'movie_id'=>'8',
            'user_id'=>'1',
            'evaluation'=>'3',
            'content'=>'このテキストは仮です。',
            'created_at'=>date('Y-m-d H:i:s'),
            ],
            [
            'movie_id'=>'9',
            'user_id'=>'1',
            'evaluation'=>'3',
            'content'=>'このテキストは仮です。',
            'created_at'=>date('Y-m-d H:i:s'),
            ],
            [
            'movie_id'=>'10',
            'user_id'=>'1',
            'evaluation'=>'3',
            'content'=>'このテキストは仮です。',
            'created_at'=>date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
