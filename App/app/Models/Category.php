<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Astrotomic\Translatable\Translatable;
use App\Models\CategoryTranslation;

class Category extends Model
{
    use HasFactory;
    use Translatable;
    
    public $translatedAttributes = ['title'];
    protected $fillable = ['slug'];
    public function categoryTranslations()
    {
        return $this->hasMany(CategoryTranslation::class);
    }
}
