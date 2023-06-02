<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\APIController;

class ListingsController extends Controller
{
    public function index(Request $request)
    {
        $characters = APIController::getAllCharacters($request->page);

        return view('characterList', compact('characters'));
    }
}
