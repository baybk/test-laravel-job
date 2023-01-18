<?php

namespace Database\Seeders;

use App\Models\Comment;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= COMMENT_MAX_NUMB_SEED; $i++) {
            Comment::factory()->create([
                'post_id' => random_int(1, POST_MAX_NUMB_SEED),
                'user_id' => random_int(1, USER_MAX_NUMB_SEED)
            ]);
        }
    }
}
