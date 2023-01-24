<?php

namespace Database\Seeders;

use App\Models\ExerciseRecord;
use Illuminate\Database\Seeder;

class ExerciseRecordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        
        for ($i = 1; $i <= MAX_NUMB_SEED; $i++) {
            ExerciseRecord::factory()->create([
                'id' => $i
            ]);
        }
    }
}
