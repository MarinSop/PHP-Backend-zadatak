<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Meal;
use App\Models\IngredientTranslation;


class Ingredient extends Model
{
    use HasFactory;
    use Translatable;
    
    public $translatedAttributes = ['title'];
    protected $fillable = ['slug'];

    public function ingredientTranslations()
    {
        return $this->hasMany(IngredientTranslation::class);
    }

    public function meals()
    {
        return $this->belongsToMany(Meal::class,'meals_ingredients', 'ingredient_id', 'meal_id')->withTimestamps();
    }
}
