<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Language;
use App\Models\Meal;

class MealTranslation extends Model
{
    use HasFactory;

    protected $fillable = ['title','description','slug'];

    public function meal()
    {
        return $this->belongsTo(Meal::class);
    }
    public function language()
    {
        return $this->belongsTo(Language::class);
    }
}
