<?php

namespace App\Providers;

use App\Http\Repositories\MealRepository;
use App\Http\Repositories\Interfaces\IMealRepository;
use App\Http\Repositories\Interfaces\ILanguageRepository;
use App\Http\Repositories\LanguageRepository;
use App\Http\Repositories\Interfaces\ICategoryRepository;
use App\Http\Repositories\CategoryRepository;
use App\Http\Repositories\Interfaces\ITagRepository;
use App\Http\Repositories\TagRepository;
use App\Http\Repositories\Interfaces\IIngredientRepository;
use App\Http\Repositories\IngredientRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(IMealRepository::class, MealRepository::class);
        $this->app->bind(ILanguageRepository::class, LanguageRepository::class);
        $this->app->bind(ITagRepository::class, TagRepository::class);
        $this->app->bind(ICategoryRepository::class, CategoryRepository::class);
        $this->app->bind(IIngredientRepository::class, IngredientRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
