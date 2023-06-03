<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class APIController extends Controller
{
    // The API wrapper layer to handle functionalities within the Rick and Morty API

    public static function getAllCharacters($page = 1) : array {

        $query = str_replace('/', '', request()->getRequestUri());

        $response = Http::retry(3, 100, throw: false)->get('https://rickandmortyapi.com/api/character' . $query)->json();
        return $response;
    }

    public static function getCharacterListPaging(Request $request, $page, $perPage) : array {
        $response = Http::retry(3, 100, throw: false)->get('https://rickandmortyapi.com/api/character', [
            'page' => $page,
            'per_page' => $perPage,
            'name' => $request->name,
            'status' => $request->status,
            'species' => $request->species,
            'gender' => $request->gender
        ]);
        return $response->json();
    }
}
