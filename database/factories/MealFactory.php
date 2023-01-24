<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class MealFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'type' => 1,
            'user_id' => 1,
            'datetime_at' => $this->faker->dateTimeBetween('-2 weeks')
        ];
    }
}
