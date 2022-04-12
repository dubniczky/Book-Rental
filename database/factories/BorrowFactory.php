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
            case 0: return [ # PENDING
                'status' => 'PENDING',
                'reader_id' => $reader,
                'book_id' => $book
            ];
            case 1: return [ # REJECTED
                'status' => 'REJECTED',
                'reader_id' => $reader,
                'book_id' => $book,
                'request_processed_at' => $this->faker->dateTimeBetween('-1 month', 'now'),
                'request_managed_by' => $request_manager
            ];
            case 2: return [ # ACCEPTED
                'status' => 'ACCEPTED',
                'reader_id' => $reader,
                'book_id' => $book,
                'request_processed_at' => $this->faker->dateTimeBetween('-1 month', 'now'),
                'request_managed_by' => $request_manager,
                'deadline' => $this->faker->dateTimeBetween('-5 days', '+3 months')
            ];
            case 3: return [ # RETURNED
                'status' => 'RETURNED',
                'reader_id' => $reader,
                'book_id' => $book,
                'request_processed_at' => $this->faker->dateTimeBetween('-1 month', '-5 day'),
                'request_managed_by' => $request_manager,
                'deadline' => $this->faker->dateTimeBetween('-5 days', '+3 months'),
                'return_managed_by' => $return_manager,
                'returned_at' => $this->faker->dateTimeBetween('-5 days', 'now')
            ];
        }
    }
}
