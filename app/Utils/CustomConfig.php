<?php

namespace App\Utils;

use Illuminate\Support\Facades\Config;

class CustomConfig
{
    public static function getGenres($id){
        // configファイルから配列を取り出す
        $genres = Config::get('genres');
        $genre = $genres[$id];
        return $genre;
    }

    



}
