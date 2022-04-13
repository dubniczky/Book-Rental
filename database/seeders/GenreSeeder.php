<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Genre;
use App\Models\Book;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Genre::factory()->count(15)->create();

        $genres = Genre::all();
        $gen_count = count($genres);
        Book::all()->each(function($book) {
            $count = rand(1, 5);
            $book->genres()->attach(
                $genres->random( $count )->pluck('id')->toArray()
            );
        });
    }
}
