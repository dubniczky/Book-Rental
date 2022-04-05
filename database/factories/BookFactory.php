<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->words(3, true),
            'authors' => $this->faker->name() . ", " . $this->faker->name(),
            'description' => $this->faker->realText(1024),
            'released_at' => $this->faker->date(),
            'cover_image' => 'images/sample.png',
            'pages' => $this->faker->numberBetween(30, 800),
            'language_code' => $this->faker->boolean() ? 'hu' : 'en',
            'isbn' => $this->faker->uniqid(),
            'in_stock' => $this->faker->numberBetween(1, 15),
        ];
    }
}
