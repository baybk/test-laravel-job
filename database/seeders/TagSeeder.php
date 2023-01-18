<?php

namespace Database\Seeders;

use App\Models\PostTag;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= TAG_MAX_NUMB_SEED; $i++) {
            Tag::factory()->create([
                'id' => $i
            ]);
        }

        for ($i = 1; $i <= TAG_MAX_NUMB_SEED; $i++) {
            PostTag::create([
                'post_id' => random_int(1, POST_MAX_NUMB_SEED),
                'tag_id' => $i,
            ]);
        }
    }
}
