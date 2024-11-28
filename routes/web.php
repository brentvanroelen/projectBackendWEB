<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\AddFilmsToListController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\NewsController;

//enorm veel problemen gehad bij het groeperen van de admin routes, uiteindelijk is het gelukt door alles uit elkaar te halen

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/home', function () {
        if (Auth::user()->role !== 'admin') {
            return redirect('/');
        }
        return view('admin.home');
    })->name('admin.home');

    Route::get('/admin/users', function () {
        if (Auth::user()->role !== 'admin') {
            return redirect('/');
        }
        $users = \App\Models\User::all();
        return view('admin.users.index', compact('users'));
    })->name('admin.users.index');

    Route::post('/admin/users/{user}/promote', [AdminController::class, 'promote'])->name('admin.users.promote');
    Route::post('/admin/users/{user}/demote', [AdminController::class, 'demote'])->name('admin.users.demote');
    Route::post('/admin/users', [AdminController::class, 'store'])->name('admin.users.store');

    Route::get('/admin/news', [NewsController::class, 'adminIndex'])->name('admin.news.index');
    Route::get('/admin/news/create', [NewsController::class, 'create'])->name('admin.news.create');
    Route::post('/admin/news', [NewsController::class, 'store'])->name('admin.news.store');
    Route::get('/admin/news/{news}/edit', [NewsController::class, 'edit'])->name('admin.news.edit');
    Route::put('/admin/news/{news}', [NewsController::class, 'update'])->name('admin.news.update');
    Route::delete('/admin/news/{news}', [NewsController::class, 'destroy'])->name('admin.news.destroy');
});

Route::get('/', function () {
    $newsItems = \App\Models\News::latest()->take(3)->get(); // Haal de laatste 3 nieuwsitems op
    return view('welcome', compact('newsItems'));
})->name('welcome');

Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/{news}', [NewsController::class, 'show'])->name('news.show');


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


Route::get('/films', [FilmController::class, 'showFilms'])->name('films.index');



require __DIR__.'/auth.php';
