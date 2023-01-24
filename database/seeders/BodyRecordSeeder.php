<?php

namespace Database\Seeders;

use App\Models\BodyRecord;
use Illuminate\Database\Seeder;

class BodyRecordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        
        for ($i = 1; $i <= MAX_NUMB_SEED; $i++) {
            BodyRecord::factory()->create([
                'id' => $i
            ]);
        }
    }
}
