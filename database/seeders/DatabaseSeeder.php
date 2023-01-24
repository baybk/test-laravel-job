<?php

namespace Database\Seeders;

use App\Models\DiaryRecord;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        if (file_exists(base_path() . '/config/constants.php')) {
            require_once(base_path() . '/config/constants.php');
        }
        Artisan::call('passport:install');
        Artisan::call('storage:link');
        
        $this->call(UserTableSeeder::class);
        $this->call(DishSeeder::class);
        $this->call(MealSeeder::class);
        $this->call(BodyRecordSeeder::class);
        $this->call(ExerciseRecordSeeder::class);
        $this->call(DiaryRecordSeeder::class);
        $this->call(RecommendedSeeder::class);
    }
}
