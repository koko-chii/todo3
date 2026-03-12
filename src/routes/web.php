<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;



Route::get('/', [TodoController::class, 'index']);
Route::patch('/todos/update', [TodoController::class, 'update']);
Route::delete('/todos/delete', [TodoController::class, 'destroy']);
