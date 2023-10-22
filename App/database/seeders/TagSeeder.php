<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tag;
use App\Models\Language;
use App\Models\TagTranslation;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = Tag::factory()->count(10)->create();
        $languages = Language::all();
        foreach($languages as $language)
        {
            foreach($tags as $tag)
            {
                TagTranslation::factory()->create([
                    'tag_id' => $tag->id,
                    'language_id' => $language->id
                ]);
            }
        }
    }
}
