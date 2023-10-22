<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;
use App\Models\Language;
use App\Models\CategoryTranslation;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Category::factory()->count(10)->create();
        $languages = Language::all();
        foreach($languages as $language)
        {
            foreach($categories as $category)
            {
                CategoryTranslation::factory()->create([
                    'category_id' => $category->id,
                    'language_id' => $language->id,
                ]);
            }
        }
    }
}
