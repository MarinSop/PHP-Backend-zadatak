<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Ingredient;
use App\Models\IngredientTranslation;
use App\Models\Language;

class IngredientSeeder extends Seeder
{
    

    public function run(): void
    {
        $ingredients = Ingredient::factory()->count(10)->create();
        $languages = Language::all();
        foreach($languages as $language)
        {
            foreach($ingredients as $ingredient)
            {
                IngredientTranslation::factory()->create([
                    'ingredient_id' => $ingredient->id,
                    'language_id' => $language->id,
                ]);
            }
        }

    }
}
