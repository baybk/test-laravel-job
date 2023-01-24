<?php

namespace Database\Seeders;

use App\Models\Meal;
use App\Models\MealDish;
use Illuminate\Database\Seeder;

class MealSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        
        for ($i = 1; $i <= MAX_NUMB_SEED; $i++) {
            $meal = Meal::factory()->create([
                'id' => $i
            ]);
            MealDish::create([
                'meal_id' => $i,
                'dish_id' => $i
            ]);
        }
    }
}
