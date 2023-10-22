<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Language;

class CategoryTranslation extends Model
{
    use HasFactory;
    protected $fillable = ['title','slug'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function language()
    {
        return $this->belongsTo(Language::class);
    }
}
