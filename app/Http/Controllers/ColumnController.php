<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Column;
use Illuminate\Support\Facades\Auth;

class ColumnController extends Controller
{
    /**
     * Display a listing of the columns.
     */
    public function index()
    {
        $user = Auth::user();
        $columns = Column::where('user_id', $user->id)->orderBy('position')->get();
        return response()->json($columns, 200);
    }

    /**
     * Store a newly created column in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'position' => 'required|integer',
        ]);

        $column = Column::create([
            'title' => $request->title,
            'position' => $request->position,
            'user_id' => Auth::id(),
        ]);

        return response()->json($column, 201);
    }

    /**
     * Update the specified column in storage.
     */
    public function update(Request $request, $id)
    {
        $column = Column::where('id', $id)->where('user_id', Auth::id())->first();

        if (!$column) {
            return response()->json(['message' => 'Column non trouvé'], 404);
        }

        $request->validate([
            'title' => 'required|string|max:255',
            'position' => 'required|integer',
        ]);

        $column->update([
            'title' => $request->title,
            'position' => $request->position,
        ]);

        return response()->json($column, 200);
    }

    /**
     * Remove the specified column from storage.
     */
    public function destroy($id)
    {
        $column = Column::where('id', $id)->where('user_id', Auth::id())->first();

        if (!$column) {
            return response()->json(['message' => 'Column non trouvé'], 404);
        }

        $column->delete();

        return response()->json(['message' => 'Column suorimer avec succès'], 200);
    }
}

