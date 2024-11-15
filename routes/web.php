<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\AddFilmsToListController;
use App\Http\Controllers\AdminController;

//enorm veel problemen gehad bij het groeperen van de admin routes, uiteindelijk is het gelukt door alles uit elkaar te halen
Route::middleware(['auth'])->group(function () {
    Route::get('/admin/home', function () {
        if (auth()->user()->role !== 'admin') {
            return redirect('/');
        }
        return view('admin.home');
    })->name('admin.home');

    Route::get('/admin/users', function () {
        if (auth()->user()->role !== 'admin') {
            return redirect('/');
        }
        $users = \App\Models\User::all();
        return view('admin.users.index', compact('users'));
    })->name('admin.users.index');

    Route::post('/admin/users/{user}/promote', [AdminController::class, 'promote'])->name('admin.users.promote');
    Route::post('/admin/users/{user}/demote', [AdminController::class, 'demote'])->name('admin.users.demote');
    Route::post('/admin/users', [AdminController::class, 'store'])->name('admin.users.store');
});


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
