<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
use Illuminate\Support\Facades\Route;
use App\Models\Book;
use App\Models\Author;

Route::get('/', function () {
    return view('wel.welcome');
});

Route::get('/book', [BookController::class, 'index']);
Route::get('/book/{book}', [BookController::class, 'show'])->name('showbook');
Route::middleware('auth')->delete('/book/{book}', [BookController::class, 'destroy'])->name('deletebook');
Route::get('/book/edit/{book}', [BookController::class, 'edit'])->name('editbook');
Route::patch('/book/{book}', [BookController::class, 'update'])->name('updatebook');
Route::post('/book', [BookController::class, 'store'])->name('insertbook');
Route::post('/book/detach', [BookController::class, 'detach_author'])->name('detachbookauthor');

Route::get('/author', [AuthorController::class, 'index']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
