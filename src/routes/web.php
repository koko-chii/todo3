<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;



Route::get('/', [TodoController::class, 'index']);
Route::post('/', [TodoController::class, 'store']);
Route::patch('/update', [TodoController::class, 'update']);
Route::delete('/delete', [TodoController::class, 'destroy']);
Route::get('/search', [TodoController::class, 'search']);

Route::get('/categories', [CategoryController::class, 'index']);
Route::post('/categories', [CategoryController::class, 'store'])->name('category.store');
Route::patch('/categories/update', [CategoryController::class, 'update']);
Route::delete('/categories/delete', [CategoryController::class, 'destroy']);

