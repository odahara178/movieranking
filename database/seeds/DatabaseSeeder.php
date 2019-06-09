<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            FavoritesTableSeeder::class,
            // MoviesTableSeeder::class,
            RelatedVideosTableSeeder::class,
            ReviewsTableSeeder::class,
            UsersTableSeeder::class,
            RankingsTableSeeder::class,
        ]);
    }
}
