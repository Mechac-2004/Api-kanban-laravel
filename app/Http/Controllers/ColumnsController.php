<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Columns;

class ColumnsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $columns = Columns::all(); 
        return response()->json($columns);
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
        // Valider la requête
        $validated = $request->validate([
            'title' => 'required|string|max:255|unique:columns,title',
        ]);

        // Créer une colonne
        $column = Columns::create($validated);

        return response()->json([
            'status' => 'success',
            'message' => 'Colonne créer avec succès',
            'data' => $column
        ], 201);
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
{
    $column = Columns::find($id);

    if (!$column) {
        return response()->json(['status' => 'error', 'message' => 'Column not found'], 404);
    }

    // Vérifier s'il y a des tâches associées
    if ($column->tasks()->exists()) {
        return response()->json([
            'status' => 'error',
            'message' => 'Vous pouvez pas supprimer cette columns car elle est associée à des tache'
        ], 400);
    }

    $column->delete();

    return response()->json([
        'status' => 'success',
        'message' => 'Colonne supprimer avec succès'
    ]);
}

}
