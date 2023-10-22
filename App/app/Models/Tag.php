<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use App\Models\TagTranslation;
use App\Models\Meal;

class Tag extends Model
{
    use HasFactory;
    use Translatable;
    
    public $translatedAttributes = ['title'];
    protected $fillable = ['slug'];

    public function tagTranslations()
    {
        return $this->hasMany(TagTranslation::class);
    }

    public function meals()
    {
        return $this->belongsToMany(Meal::class,'meals_tags', 'tag_id', 'meal_id')->withTimestamps();
    }
}
