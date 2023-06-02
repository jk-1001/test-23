<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class APIController extends Controller
{
    // The API wrapper layer to handle functionalities within the Rick and Morty API

    public static function getAllCharacters($page = 1) : array {
        $query = Http::asJson()->get('https://rickandmortyapi.com/api/character?page=' . $page);
        return $query->json();
    }
}
