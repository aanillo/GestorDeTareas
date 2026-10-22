<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;


Route::get('/', [TaskController::class, 'index'])->name('tasks.home');

Route::post('/tasks', [TaskController::class, 'store'])->name('tasks.store');

Route::put('/tasks/{task}/toggle', [TaskController::class, 'toggleTask'])->name('tasks.toggle');