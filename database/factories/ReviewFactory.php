<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Review;
use Faker\Generator as Faker;

$factory->define(Review::class, function (Faker $faker) {
    return [
        'movie_id' => $faker->numberBetween(1, 10),
        'user_id' => $faker->numberBetween(1, 5),
        'evaluation'=> $faker->numberBetween(1, 5),
        'content'=> $faker->paragraph(1),
    ];
});
