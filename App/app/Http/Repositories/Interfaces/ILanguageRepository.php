<?php

namespace App\Http\Repositories\Interfaces;

interface ILanguageRepository
{
    public function checkIfExists($locale);
}