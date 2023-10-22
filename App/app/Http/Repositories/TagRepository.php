<?php

namespace App\Http\Repositories;

use App\Models\Tag;
use App\Http\Repositories\Interfaces\ITagRepository;


class TagRepository implements ITagRepository
{
    public function getAllTags()
    {
        return Tag::all();
    }
}