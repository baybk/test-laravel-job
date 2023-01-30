<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class RecommendedFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->realText(50),
            'content' => $this->faker->realText(100),
            'type' => $this->faker->numberBetween(1, 4),
            'datetime_at' => $this->faker->dateTimeBetween('-4 days')
        ];
    }
}
