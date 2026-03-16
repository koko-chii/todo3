<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;



Route::get('/', [TodoController::class, 'index']);
Route::post('/', [TodoController::class, 'store']);

Route::patch('/update', [TodoController::class, 'update']);
Route::delete('/delete', [TodoController::class, 'destroy']);
