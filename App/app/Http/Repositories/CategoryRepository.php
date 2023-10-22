<?php

namespace App\Http\Repositories;

use App\Http\Repositories\Interfaces\ICategoryRepository;
use App\Models\Category;

class CategoryRepository implements ICategoryRepository
{
    public function getAllCategories()
    {
        return Category::all();
    }
}