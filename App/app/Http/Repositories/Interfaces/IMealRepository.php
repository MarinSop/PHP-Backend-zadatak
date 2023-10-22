<?php

namespace App\Http\Repositories\Interfaces;

use Illuminate\Http\Request;

interface IMealRepository
{
    public function getAllMeals(Request $request);
}