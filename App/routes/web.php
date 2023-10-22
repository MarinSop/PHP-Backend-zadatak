<?php

use Illuminate\Support\Facades\Route;
use App\Models\Ingredient;
use App\Models\Tag;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $ingredient = Ingredient::first();
    $translations = $ingredient->translations()->whereHas('language', function ($query) {
        $query->where('locale', 'en_GB');
    })->get()->first()->title;
    return $translations;
});
