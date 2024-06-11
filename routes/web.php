<?php

use Illuminate\Console\View\Components\Task;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;

Route::get('/', [TaskController::class , 'index']);
Route::get('/tasks/create', [TaskController::class , 'create']);
Route::get('/tasks/{task}', [TaskController::class , 'show']);
Route::post('/tasks', [TaskController::class , 'store']);
Route::delete('/tasks/{task}', [TaskController::class , 'destroy']);
Route::patch('/tasks/{task}/complete', [TaskController::class , 'complete']);