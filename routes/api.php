<?php

use App\Http\Controllers\ColumnController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth:sanctum')->group(function () {
    // Routes pour les colonnes
    Route::get('/columns', [ColumnController::class, 'index']);
    Route::post('/columns', [ColumnController::class, 'store']);
    Route::put('/columns/{id}', [ColumnController::class, 'update']);
    Route::delete('/columns/{id}', [ColumnController::class, 'destroy']);

    // Routes pour les tâches
    Route::get('/tasks', [TaskController::class, 'index']);
    Route::post('/tasks', [TaskController::class, 'store']);
    Route::put('/tasks/{id}', [TaskController::class, 'update']);
    Route::delete('/tasks/{id}', [TaskController::class, 'destroy']);
});
Route::middleware(['cors'])->get('/some-api', function () {
    return response()->json(['message' => 'This route uses the CORS middleware']);
});
Route::apiResource('columns', ColumnController::class);
Route::apiResource('tasks', TaskController::class);