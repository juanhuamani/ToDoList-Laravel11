<?php

use Illuminate\Console\View\Components\Task;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/', [TaskController::class , 'index']);
Route::post('/tasks', [TaskController::class , 'store']);
Route::get('/tasks/create', [TaskController::class , 'create']);
Route::get('/tasks/category/{category}', [TaskController::class , 'category']);
Route::get('/tasks/search', [TaskController::class , 'search']);
Route::get('/tasks/{task}', [TaskController::class , 'show']);
Route::delete('/tasks/{task}', [TaskController::class , 'destroy']);
Route::put('/tasks/{task}', [TaskController::class , 'update']);
Route::get('/tasks/{task}/edit', [TaskController::class , 'edit']);
Route::patch('/tasks/{task}/complete', [TaskController::class , 'complete']);
Route::patch('/tasks/{task}/incomplete', [TaskController::class , 'incomplete']);


