<?php

namespace App\Http\Repositories;

use App\Http\Repositories\Interfaces\ILanguageRepository;
use App\Models\Language;

class LanguageRepository implements ILanguageRepository
{
    public function checkIfExists($locale)
    {
        $language = Language::where('locale',$locale)->first();

        return $language ? true : false;
    }
}