<?php

use App\Http\Controllers\BookController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
route::post('books', [BookController::class, 'store']);
route::get('books/{id}', [BookController::class, 'show']);
route::get('books', [BookController::class, 'index']);
route::put('books/{id}', [BookController::class, 'update']);
route::delete('books/{id}', [BookController::class, 'destroy']);
