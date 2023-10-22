<?php

namespace App\Http\Controllers;

use App\Http\Repositories\Interfaces\IMealRepository;
use App\Http\Resources\MealPaginatedResource;
use App\Http\Resources\MealResource;
use App\Http\Repositories\Interfaces\ILanguageRepository;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class MealController extends Controller
{
    private $mealRepository;
    private $languageRepository;

    public function __construct(IMealRepository $mealRepository, ILanguageRepository $languageRepository)
    {
        $this->mealRepository = $mealRepository;
        $this->languageRepository = $languageRepository;
    }


    public function getAllMeals(Request $request)
    {
        $request->validate([
            'per_page' => 'nullable|integer|min:1',
            'page' => 'nullable|integer|min:1',
            'category' => [
                'nullable',
                'regex:/^(NULL|!NULL|\d+)$/i',
            ],
            'tags' => [
                'nullable',
                'regex:/^(\d+,)*\d*$/',
            ],
            'with' => [
                'nullable',
                'regex:/^(category|tags|ingredients)(,(category|tags|ingredients))*$/',
            ],
            'lang' => [
                'required',
                Rule::exists('languages', 'locale'), 
            ],
            'diff_time' => 'nullable|integer|min:0'
        ]);
        
        return new MealPaginatedResource(MealResource::collection($this->mealRepository->getAllMeals($request)));
    }
}
