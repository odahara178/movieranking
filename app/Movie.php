<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    protected $fillable = [
        'title',
        'image_path',
        'summary',
        'genre',
        'TMDB_id',
    ];
}
