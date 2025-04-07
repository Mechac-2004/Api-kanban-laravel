<?php

use App\Http\Controllers\ColumnController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

// Routes protégées par authentification
Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('columns', ColumnController::class);
    Route::apiResource('tasks', TaskController::class);
});
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
