<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= CATEGORY_MAX_NUMB_SEED; $i++) {
            Category::factory()->create([
                'id' => $i
            ]);
        }
    }
}
