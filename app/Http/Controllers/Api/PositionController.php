<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Position;
use Illuminate\Http\Request;

class PositionController extends Controller
{
    // Get all positions
    public function index()
    {
        $positions = Position::all();
        return response()->json($positions);
    }

    // Create a new position
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:positions',
        ]);

        $position = Position::create($request->all());
        return response()->json($position, 201);
    }

    // Get a single position
    public function show(Position $position)
    {
        return response()->json($position);
    }

    // Update a position
    public function update(Request $request, Position $position)
    {
        $request->validate([
            'name' => 'sometimes|string|unique:positions,name,' . $position->id,
        ]);

        $position->update($request->all());
        return response()->json($position);
    }

    // Delete a position
    public function destroy(Position $position)
    {
        $position->delete();
        return response()->json(null, 204);
    }
}