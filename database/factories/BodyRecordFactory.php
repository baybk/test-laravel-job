<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BodyRecordFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'weight' => $this->faker->numberBetween(50, 70),
            'fat_percentage' => $this->faker->numberBetween(25, 40),
            'date_at' => $this->faker->dateTimeBetween('-4 days'),
            'user_id' => 1
        ];
    }
}
