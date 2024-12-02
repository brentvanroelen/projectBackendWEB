<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\FilmList;

class AddFilmsToListController extends Controller
{
    public function addToList(Request $request, $listTitle)
    {
        $user = Auth::user();
        $filmList = $user->filmLists()->firstOrCreate(['title' => $listTitle]);

        $filmList->items()->create([
            'film_id' => $request->input('film_id'),
            'film_title' => $request->input('film_title'),
            'film_poster' => $request->input('film_poster'),
        ]);

        return back()->with('status', 'Film added to ' . $listTitle . ' list.');
    }

    public function showLists()
    {
        $user = Auth::user();
        $filmLists = $user->filmLists()->with('items')->get();

        return view('filmLists', compact('filmLists'));
    }
}