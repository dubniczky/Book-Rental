<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     */
    public function definition()
    {
        return [
            'title' => $this->faker->words(3, true),
            'authors' => $this->faker->name() . ", " . $this->faker->name(),
            'description' => $this->faker->realText(1024),
            'released_at' => $this->faker->date(),
            'cover_image' => 'images/sample.png',
            'pages' => $this->faker->numberBetween(30, 500),
            'language_code' => $this->faker->boolean() ? 'hu' : 'en',
            'isbn' => $this->faker->isbn13(), # Apparently it has a built-in method
            'in_stock' => $this->faker->numberBetween(1, 15),
        ];
    }
}
