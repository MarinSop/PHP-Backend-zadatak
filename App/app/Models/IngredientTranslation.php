<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Language;
use App\Models\Ingredient;

class IngredientTranslation extends Model
{
    use HasFactory;

    protected $fillable = ['title','slug'];

    public function ingredient()
    {
        return $this->belongsTo(Ingredient::class);
    }
    public function language()
    {
        return $this->belongsTo(Language::class);
    }
}