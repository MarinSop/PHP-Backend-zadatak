<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Category;
use App\Models\Language;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CategoryTranslation>
 */
class CategoryTranslationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->word(),
            'slug' => $this->faker->unique()->slug(2,false)
        ];
    }
}
