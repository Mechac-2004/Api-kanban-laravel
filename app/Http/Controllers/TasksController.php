<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tasks;

class TasksController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Tasks::all();
        return response()->json($tasks);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'status' => 'required|string',
            'column_id' => 'required|exists:columns,column_id',
        ]);

        $task = Tasks::create($validated);

        return response()->json($task, 201);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $task = Tasks::find($id);

        if (!$task) {
            return response()->json(['status' => 'error', 'message' => 'Task not found'], 404);
        }

        // Définition des règles de validation
        $validated = $request->validate([
            'title' => 'sometimes|string|max:255',
            'description' => 'sometimes|string',
            'status' => 'sometimes|string',
            'user_id' => 'sometimes|exists:users,id',
            'column_id' => 'sometimes|exists:columns,column_id',
        ]);

        // Mise à jour des champs validés
        $task->update($validated);

        return response()->json([
            'status' => 'success',
            'message' => 'Tâche modifier',
            'data' => $task
        ]);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Recherche de la tâche
        $task = Tasks::find($id);

        // Vérification si la tâche existe
        if (!$task) {
            return response()->json([
                'status' => 'error',
                'message' => 'La tâche n\'exist pas'
            ], 404);
        }

        // Suppression de la tâche
        $task->delete();

        // Retourner une réponse de succès
        return response()->json([
            'status' => 'success',
            'message' => 'Tâche supprimer avec succès'
        ], 200);
    }

}
