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
            'datetime_at' => $this->faker->dateTimeBetween('-2 weeks')
        ];
    }
}
