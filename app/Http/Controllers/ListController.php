<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\APIController;

class ListController extends Controller
{
    public function index(Request $request)
    {
        $characters = APIController::getAllCharacters($request->page);
        // dd($characters);

        return view('characterList', compact('characters'));
    }

    public function getEpisode($url) {
        $episode = str_replace('https://rickandmortyapi.com/api/episode/', '', $url);
        return $episode;
    }
}
