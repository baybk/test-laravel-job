<?php

namespace Database\Seeders;

use App\Models\BodyRecord;
use App\Models\ExerciseRecord;
use Carbon\Carbon;
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
        for ($i = 3; $i >= 0; $i--) {
            $now = Carbon::now();
            $now->addDays($i);
            
            for ($j = 0; $j < 4; $j++) {
                ExerciseRecord::factory()->create([
                    'date_at' => $now
                ]);
            }
        }
    }
}
