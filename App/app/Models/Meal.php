<?php

namespace App\Models;

use Astrotomic\Translatable\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\MealTranslation;
use App\Models\Category;
use App\Models\Ingredient;
use App\Models\Tag;

class Meal extends Model
{
    use HasFactory;
    use Translatable;

    public $translatedAttributes = ['title','description'];
    protected $fillable = ['status','slug','category_id'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function mealTranslations()
    {
        return $this->hasMany(MealTranslation::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class,'meals_tags', 'meal_id', 'tag_id')->withTimestamps();
    }

    public function ingredients()
    {
        return $this->belongsToMany(Ingredient::class,'meals_ingredients', 'meal_id', 'ingredient_id')->withTimestamps();
    }

    public function getCategory()
    {
        return $this->category()->get()->first();
    }

    public function getTags()
    {
        return $this->tags()->get();
    }

    public function getIngredients()
    {
        return $this->ingredients()->get();
    }
}
