<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= POST_MAX_NUMB_SEED; $i++) {
            Post::factory()->create([
                'category_id' => random_int(1, CATEGORY_MAX_NUMB_SEED),
                'user_id' => random_int(1, USER_MAX_NUMB_SEED),
                'image' => POST_SAMPLE_IMAGE
            ]);
        }
    }
}
