<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TransactionController; // GUNAKAN YANG INI

// BOOK: public
Route::get('/books', [BookController::class, 'index']);

// AUTH
Route::post('/login', [AuthController::class, 'login']);

// PUBLIC ACCESS
Route::apiResource('authors', AuthorController::class)->only(['index', 'show']);
Route::apiResource('genres', GenreController::class)->only(['index', 'show']);

// ADMIN ACCESS: authors, genres (Create, Update, Delete), and transaksi Read All & Delete
Route::middleware(['auth:sanctum', 'checkrole:admin'])->group(function () {
    Route::apiResource('authors', AuthorController::class)->only(['store', 'update', 'destroy']);
    Route::apiResource('genres', GenreController::class)->only(['store', 'update', 'destroy']);
    Route::get('/transactions', [TransactionController::class, 'index']);
    Route::delete('/transactions/{id}', [TransactionController::class, 'destroy']);
});


// CUSTOMER ACCESS: transaksi Create, Show, Update (punya sendiri)
Route::middleware(['auth:sanctum', 'checkrole:customer'])->group(function () {
    Route::post('/transactions', [TransactionController::class, 'store']);
    Route::get('/transactions/{id}', [TransactionController::class, 'show']);
    Route::put('/transactions/{id}', [TransactionController::class, 'update']);
});