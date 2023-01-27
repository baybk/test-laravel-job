<?php

namespace Database\Seeders;

use App\Models\DiaryRecord;
use App\Models\ExerciseRecord;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DiaryRecordSeeder extends Seeder
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
                DiaryRecord::factory()->create([
                    'datetime_at' => $now
                ]);
            }
        }
    }
}
