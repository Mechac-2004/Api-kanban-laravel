<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ColumnController;

Route::get('/', function (Request $request) {
    return 'API';
});

        // Routes publiques pour l'inscription et la connexion
Route::post('/register',[AuthController::class, 'register']);
Route::post('/login',[AuthController::class, 'login']);

        // Routes protégées par authentification
Route::middleware('auth:sanctum')->group(function () {

    // Route pour récupérer l'utilisateur authentifié
    Route::get('/user', [AuthController::class, 'user']);
});

// Routes pour la gestion des tâches
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/tasks', [TaskController::class, 'index']);
    Route::post('/tasks', [TaskController::class, 'store']);
    Route::get('/tasks/{id}', [TaskController::class, 'show']);
    Route::put('/tasks/{id}', [TaskController::class, 'update']);
    Route::delete('/tasks/{id}', [TaskController::class, 'destroy']);
});
        // Routes pour la gestion des colonnes
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/columns', [ColumnController::class, 'index']);
    Route::post('/columns', [ColumnController::class, 'store']);
    Route::put('/columns/{id}', [ColumnController::class, 'update']);
    Route::delete('/columns/{id}', [ColumnController::class, 'destroy']);
});