<?php

namespace Database\Seeders;

use App\Models\DiaryRecord;
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
        for ($i = 1; $i <= MAX_NUMB_SEED; $i++) {
            DiaryRecord::factory()->create([
                'id' => $i
            ]);
        }
    }
}
