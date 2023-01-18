<?php

namespace Database\Factories;

use App\Lib\Helper;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    use Helper;
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = $this->faker->text(20);
        return [
            'title' => $title,
            'slug' => $this->slugify($title)
        ];
    }
}
