<?php

namespace Database\Seeders;

use App\Models\Recommended;
use App\Models\Tag;
use App\Models\RecommendedTag;
use Illuminate\Database\Seeder;

class RecommendedSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {        
        for ($i = 1; $i <= MAX_NUMB_SEED; $i++) {
            $rec = Recommended::factory()->create([
                'id' => $i
            ]);

            $tag = Tag::factory()->create([
                'id' => $i
            ]);

            RecommendedTag::create([
                'recommended_id' => $i,
                'tag_id' => $i
            ]);
        }
    }
}
