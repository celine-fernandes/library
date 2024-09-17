<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\UserController;

Route::get('/', [BookController::class, 'index'])->name('books.index');
Route::get('/login', [UserController::class, 'showLoginForm'])->name('login');
Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout'])->name('logout');

Route::middleware(['auth:sanctum',config('jetstream.auth_session'),'verified',])->group(function () {

    // BOOKS

    // Route pour afficher le formulaire de création d'un livre
    Route::get('/books/create', [BookController::class, 'create'])->name('books.create');

    // Route pour enregistrer un nouveau livre
    Route::post('/books', [BookController::class, 'store'])->name('books.store');

    // Route pour afficher les détails d'un livre
    Route::get('/books/{id}', [BookController::class, 'show'])->name('books.show');

    // Route pour afficher le formulaire de modification d'un livre
    Route::get('/books/{id}/edit', [BookController::class, 'edit'])->name('books.edit');

    // Route pour mettre à jour un livre existant
    Route::put('/books/{id}', [BookController::class, 'update'])->name('books.update');

    // Route pour supprimer un livre
    Route::delete('/books/{id}', [BookController::class, 'destroy'])->name('books.destroy');


    // AUTHORS

    // Route pour afficher la liste des auteurs
    Route::get('/authors', [AuthorController::class, 'index'])->name('authors.index');

    // Route pour afficher le formulaire de création d'un auteur
    Route::get('/authors/create', [AuthorController::class, 'create'])->name('authors.create');

    // Route pour enregistrer un nouvel auteur
    Route::post('/authors', [AuthorController::class, 'store'])->name('authors.store');

    // Route pour afficher les détails d'un auteur
    Route::get('/authors/{author}', [AuthorController::class, 'show'])->name('authors.show');

    // Route pour afficher le formulaire d'édition d'un auteur existant
    Route::get('/authors/{author}/edit', [AuthorController::class, 'edit'])->name('authors.edit');

    // Route pour mettre à jour les informations d'un auteur
    Route::put('/authors/{author}', [AuthorController::class, 'update'])->name('authors.update');

    // Route pour supprimer un auteur
    Route::delete('/authors/{author}', [AuthorController::class, 'destroy'])->name('authors.destroy');
});
