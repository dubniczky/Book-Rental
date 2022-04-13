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
        Book::all()->each(function($book) use($genres) {
            $count = rand(1, 5);
            $book->genres()->attach(
                $genres->random( $count )->pluck('id')->toArray()
            );
        });
    }
}
