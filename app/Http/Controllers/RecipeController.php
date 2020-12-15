<?php

namespace App\Http\Controllers;

use App\Servecies\Spoonacular;


class RecipeController extends Controller
{
    private $spoonacular;

    public function __construct(Spoonacular $spoonacular)
    {
        $this->spoonacular = $spoonacular;
    }

    public function search() {
    }

    public function show() {
        $recipies = $this->spoonacular->getRecipe('apple');
        return view('recipies.show', ['recipies' => $recipies['recipes']]);
    }
}
