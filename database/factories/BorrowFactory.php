<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Book;
use App\Models\User;

class BorrowFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        # Get is deprecated and it's called pluck now

        # Get random reader
        $reader = $this->faker->randomElement(
            User::where('is_librarian', '=', '0')->pluck('id')->toArray()
        );

        # Get random request manager
        $request_manager = $this->faker->randomElement(
            User::where('is_librarian', '=', '1')->pluck('id')->toArray()
        );

        # Get random return manager
        $return_manager = $this->faker->randomElement(
            User::where('is_librarian', '=', '1')->pluck('id')->toArray()
        );

        # Get random book
        $book = $this->faker->randomElement(
            Book::where('in_stock', '>', '0')->pluck('id')->toArray()
        );

        # Get random state
        $state = $this->faker->random_int(0, 3);


        switch ($state) {
            case 0:
                return 
        }
        return [
            //
        ];
    }
}
