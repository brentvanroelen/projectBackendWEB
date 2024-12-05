<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function store(Request $request, $filmId)
    {
        $request->validate([
            'review' => 'required|string',
            'score' => 'required|integer|min:1|max:10',
        ]);

        Review::create([
            'user_id' => Auth::id(),
            'film_id' => $filmId,
            'review' => $request->input('review'),
            'score' => $request->input('score'),
        ]);

        return redirect()->route('films.index')->with('status', 'Review added successfully.');
    }
}