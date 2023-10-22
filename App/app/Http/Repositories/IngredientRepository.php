<?php
namespace App\Http\Repositories;
use App\Models\Ingredient;
use App\Http\Repositories\Interfaces\IIngredientRepository;

class IngredientRepository implements IIngredientRepository
{

    public function getAllIngredients()
    {
        return Ingredient::all();
    }
}