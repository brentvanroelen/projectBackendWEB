<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\AddFilmsToListController;

Route::get('/', function () {
    return view('welcome');
}) -> name('welcome');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/films/add-to-list/{listTitle}', [AddFilmsToListController::class, 'addToList'])->name('films.addToList');
    Route::get('/film-lists', [AddFilmsToListController::class, 'showLists'])->name('filmLists.index');
});

Route::get('/profile', function () {
    return view('profile');
})->middleware(['auth'])->name('profile');


Route::get('/films', 
[FilmController::class, 'showFilms'])
->name('films.index');



require __DIR__.'/auth.php';
