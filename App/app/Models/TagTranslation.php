<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Tag;
use App\Models\Language;

class TagTranslation extends Model
{
    use HasFactory;
    protected $fillable = ['title','slug'];

    public function tag()
    {
        return $this->belongsTo(Tag::class);
    }
    public function language()
    {
        return $this->belongsTo(Language::class);
    }
}
