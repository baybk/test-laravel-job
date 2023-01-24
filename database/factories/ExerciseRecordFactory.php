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
            'kcal' => 20,
            'minutes' => 10,
            'user_id' => 1,
            'date_at' => $this->faker->dateTimeBetween('-2 weeks')
        ];
    }
}
