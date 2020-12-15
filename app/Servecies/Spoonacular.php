<?php
namespace App\Servecies;

use Illuminate\Support\Facades\Http;

class Spoonacular {


    public function getRecipe() {
        
        $api_key = '93ce9be56cdc42998c6df4eade4f3547';
        $url = 'https://api.spoonacular.com/recipes/random';
        $amount = 1;

        $response = Http::get($url . '?number=' . $amount . '&apiKey=' . $api_key);

        return $response->json();
    }
}