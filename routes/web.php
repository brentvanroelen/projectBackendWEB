<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FilmController;
use App\Http\Controllers\AddFilmsToListController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\FaqCategoryController;
use App\Http\Controllers\FaqQuestionController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\ReviewController;


//enorm veel problemen gehad bij het groeperen van de admin routes, uiteindelijk is het gelukt door alles uit elkaar te halen
Route::get('/faq', [FaqCategoryController::class, 'showFaq'])->name('faq.index');

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
    Route::get('/admin/users/create', [RegisteredUserController::class, 'createAdmin'])->name('admin.users.create');
    Route::post('/admin/users', [RegisteredUserController::class, 'store'])->name('admin.users.store');

    Route::get('/admin/news', [NewsController::class, 'adminIndex'])->name('admin.news.index');
    Route::get('/admin/news/create', [NewsController::class, 'create'])->name('admin.news.create');
    Route::post('/admin/news', [NewsController::class, 'store'])->name('admin.news.store');
    Route::get('/admin/news/{news}/edit', [NewsController::class, 'edit'])->name('admin.news.edit');
    Route::put('/admin/news/{news}', [NewsController::class, 'update'])->name('admin.news.update');
    Route::delete('/admin/news/{news}', [NewsController::class, 'destroy'])->name('admin.news.destroy');

    Route::resource('admin/faq-categories', FaqCategoryController::class, ['as' => 'admin']);
    Route::resource('admin/faq-questions', FaqQuestionController::class, ['as' => 'admin']);
});


Route::get('/contact', [ContactController::class, 'show'])->name('contact.show');
Route::post('/contact', [ContactController::class, 'send'])->name('contact.send');

Route::get('/', function () {
    $newsItems = \App\Models\News::latest()->take(3)->get(); // Haal de laatste 3 nieuwsitems op
    return view('welcome', compact('newsItems'));
})->name('welcome');

Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/{news}', [NewsController::class, 'show'])->name('news.show');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/profiles', [ProfileController::class, 'index'])->name('profiles.index');
Route::get('/profile/{user}', [ProfileController::class, 'show'])->name('profile.show');
Route::middleware(['auth'])->group(function () {
    Route::get('/profile/{user}/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile/{user}', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/films/{film}/reviews', [ReviewController::class, 'store'])->name('reviews.store');
});

Route::get('/profile', function () {
    return redirect()->route('profile.show', Auth::user());
})->middleware(['auth'])->name('profile');

Route::get('/films', [FilmController::class, 'showFilms'])->name('films.index');
Route::get('/film-lists', [AddFilmsToListController::class, 'showLists'])->name('filmLists.index');
Route::post('/films/add-to-list/{listTitle}', [AddFilmsToListController::class, 'addToList'])->name('films.addToList');
Route::get('/film-lists', [AddFilmsToListController::class, 'showLists'])->name('filmLists.index');
require __DIR__.'/auth.php';
