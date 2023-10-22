<?php

namespace Database\Factories;

use App\Models\Language;
use Illuminate\Database\Eloquent\Factories\Factory;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Language>
 */
require_once 'vendor/autoload.php';
class LanguageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = Language::class;

    public function definition(): array
    {
        return [
            'name' =>  $this->faker->unique()->randomElement(['Croatian','English']),
            'locale' =>  $this->faker->unique()->randomElement(['hr_HR','en_GB']),
        ];
    }
}
