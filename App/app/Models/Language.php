<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TagTranslation;

class Language extends Model
{
    use HasFactory;

    protected $fillable = ['language','locale'];

    public function ingredientTranslations()
    {
        return $this->hasMany(IngredientTranslation::class);
    }
    public function tagTranslations()
    {
        return $this->hasMany(TagTranslation::class);
    }
}
