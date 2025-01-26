<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Leave;
use Illuminate\Http\Request;

class LeaveController extends Controller
{
    // Get all leaves
    public function index()
    {
        $leaves = Leave::with('employee')->get();
        return response()->json($leaves);
    }

    // Create a new leave
    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'type' => 'required|in:sick,annual,unpaid',
            'reason' => 'nullable|string',
            'status' => 'required|in:pending,approved,rejected',
        ]);

        $leave = Leave::create($request->all());
        return response()->json($leave, 201);
    }

    // Get a single leave
    public function show(Leave $leave)
    {
        return response()->json($leave->load('employee'));
    }

    // Update a leave
    public function update(Request $request, Leave $leave)
    {
        $request->validate([
            'employee_id' => 'sometimes|exists:employees,id',
            'start_date' => 'sometimes|date',
            'end_date' => 'sometimes|date|after_or_equal:start_date',
            'type' => 'sometimes|in:sick,annual,unpaid',
            'reason' => 'nullable|string',
            'status' => 'sometimes|in:pending,approved,rejected',
        ]);

        $leave->update($request->all());
        return response()->json($leave);
    }

    // Delete a leave
    public function destroy(Leave $leave)
    {
        $leave->delete();
        return response()->json(null, 204);
    }
}