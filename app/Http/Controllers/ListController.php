<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\APIController;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Http;

class ListController extends Controller
{
    public function index(Request $request)
    {
        $characters = APIController::getAllCharacters($request->page);
        // dd($characters);

        // Paginate
        $page = LengthAwarePaginator::resolveCurrentPage();
        $perPage = 20;

        $response = Http::retry(3, 100, throw: false)->get('https://rickandmortyapi.com/api/character', [
            'page' => $page,
            'per_page' => $perPage,
            'name' => $request->name,
            'status' => $request->status,
            'species' => $request->species,
            'gender' => $request->gender
        ]);
        $results = $response->json();
        $count = 0;

        // Catch and handle any error from the API
        if(isset($results['error'])) {
            $characters['results'] = [];
        } else {
            $count = $results['info']['count'];
        }

        $paginator = new LengthAwarePaginator($results, $count, $perPage, $page, [
            'path' => LengthAwarePaginator::resolveCurrentPath(),
        ]);

        return view('characterList', compact(['characters', 'paginator']));
    }

    public function getEpisode($url) {
        $episode = str_replace('https://rickandmortyapi.com/api/episode/', '', $url);
        return $episode;
    }
}
