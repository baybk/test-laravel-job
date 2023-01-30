<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ExerciseRecordFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->realText(50),
            'description' => $this->faker->realText(100),
            'kcal' => $this->faker->numberBetween(5, 50),
            'minutes' => $this->faker->numberBetween(1, 20),
            'user_id' => 2,
            'date_at' => $this->faker->dateTimeBetween('-4 days')
        ];
    }
}
