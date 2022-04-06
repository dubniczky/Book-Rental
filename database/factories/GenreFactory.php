<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class GenreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $styles = [
            'primary',
            'secondary',
            'success',
            'danger',
            'warning',
            'info',
            'light',
            'dark'
        ];

        return [
            'name' => $this->faker->word(),
            'style' => $styles[ $this->faker->numberBetween(0, sizeof($styles)-1) ]
        ];
    }
}
