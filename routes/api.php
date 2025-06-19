<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\AuthController;

Route::get('/books', [BookController::class, 'index']);


Route::post('/login', [AuthController::class, 'login']);


// PUBLIC ACCESS
Route::apiResource('authors', AuthorController::class)->only(['index', 'show']);
Route::apiResource('genres', GenreController::class)->only(['index', 'show']);

// PROTECTED FOR ADMIN (CREATE, UPDATE, DELETE)
Route::middleware(['auth:sanctum', 'admin'])->group(function () {
    Route::apiResource('authors', AuthorController::class)->only(['store', 'update', 'destroy']);
    Route::apiResource('genres', GenreController::class)->only(['store', 'update', 'destroy']);
});