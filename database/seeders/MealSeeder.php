<?php

namespace Database\Seeders;

use App\Models\Meal;
use App\Models\Dish;
use App\Models\MealDish;
use Carbon\Carbon;
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
        for ($i = 3; $i >= 0; $i--) {
            $now = Carbon::now();
            $now->subDays($i);
            
            for ($j = 0; $j < 4; $j++) {
                $type = $j % 4;
                $meal = Meal::factory()->create([
                    'datetime_at' => $now,
                    'type' => $type + 1
                ]);
                $dish = Dish::factory()->create([
                ]);
                MealDish::create([
                    'meal_id' => $meal->id,
                    'dish_id' => $dish->id
                ]);
            }
        }
            
    }
}
