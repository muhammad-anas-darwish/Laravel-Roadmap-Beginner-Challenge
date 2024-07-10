<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->name(),
            'full_text' => $this->faker->text(),
            // 'image' => $this->faker->image(public_path('storage/images'), 640, 480, null, false),
            'category_id' => $this->faker->randomElement(Category::pluck('id')->toArray()),
        ];
    }
}
