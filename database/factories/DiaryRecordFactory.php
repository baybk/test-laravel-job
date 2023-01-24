<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DiaryRecordFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'diary' => $this->faker->realText(100),
            'user_id' => 1,
            'datetime_at' => $this->faker->dateTimeBetween('-2 weeks')
        ];
    }
}
