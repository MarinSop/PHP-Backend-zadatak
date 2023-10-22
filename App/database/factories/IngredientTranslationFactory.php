<?php

namespace Database\Factories;

use App\Models\IngredientTranslation;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Ingredient;
use App\Models\Language;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\IngredientTranslation>
 */
class IngredientTranslationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

     protected $model = IngredientTranslation::class;
    
    public function definition(): array
    {
        return [
            'title' => $this->faker->word(),
            'slug' => $this->faker->unique()->slug(2,false)
        ];
    }
}
