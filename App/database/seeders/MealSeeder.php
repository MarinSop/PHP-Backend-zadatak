<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Meal;
use App\Models\Language;
use App\Models\MealTranslation;
use App\Models\Tag;
use App\Models\Ingredient;
use Faker\Factory as Faker;

class MealSeeder extends Seeder
{

    public function run(): void
    {
        $tags = Tag::pluck('id');
        $ingredients = Ingredient::pluck('id');
        $meals = Meal::factory()->count(10)->create();
        $languages = Language::all();
        foreach($meals as $meal)
        {
            $faker = Faker::create();
            $meal->tags()->attach($faker->randomElements($tags,$faker->numberBetween(1,count($tags))));
            $meal->ingredients()->attach($faker->randomElements($ingredients,$faker->numberBetween(1,count($ingredients))));
            foreach($languages as $language)
            {
                MealTranslation::factory()->create([
                    'meal_id' => $meal->id,
                    'language_id' => $language->id
                ]);
            }
        }
    }
}
