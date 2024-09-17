<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiBookController;
use App\Http\Controllers\Api\ApiAuthorController;  

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//BOOKS

Route::get('books', [ApiBookController::class, 'indexApi']);



//AUTHORS



Route::get('authors', [ApiAuthorController::class, 'indexApi'])->name('api.authors.index');

Route::get('authors/{id}', [ApiAuthorController::class, 'showApi'])->name('api.authors.show');

Route::post('authors', [ApiAuthorController::class, 'storeApi'])->name('api.authors.store');

Route::put('authors/{id}', [ApiAuthorController::class, 'updateApi'])->name('api.authors.update');





Route::delete('authors/{id}', [ApiAuthorController::class, 'destroyApi'])->name('api.authors.destroy');



Route::get('books', [ApiBookController::class, 'index'])->name('api.books.index');


Route::get('books/{id}', [ApiBookController::class, 'show'])->name('api.books.show');


Route::post('books', [ApiBookController::class, 'store'])->name('api.books.store');


Route::put('books/{id}', [ApiBookController::class, 'update'])->name('api.books.update');


Route::delete('books/{id}', [ApiBookController::class, 'destroy'])->name('api.books.destroy');
