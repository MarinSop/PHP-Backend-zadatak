<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Meal>
 */
class MealFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categories = Category::pluck('id');
        return [
            'category_id' => $this->faker->optional($weight = 0.8)->randomElement($categories),
            'status' => 'created',
            'slug' => $this->faker->unique()->slug(2,false)
        ];
    }
}
