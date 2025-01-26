<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    // Get all departments
    public function index()
    {
        $departments = Department::all();
        return response()->json($departments);
    }

    // Create a new department
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|unique:departments',
        ]);

        $department = Department::create($request->all());
        return response()->json($department, 201);
    }

    // Get a single department
    public function show(Department $department)
    {
        return response()->json($department);
    }

    // Update a department
    public function update(Request $request, Department $department)
    {
        $request->validate([
            'name' => 'sometimes|string|unique:departments,name,' . $department->id,
        ]);

        $department->update($request->all());
        return response()->json($department);
    }

    // Delete a department
    public function destroy(Department $department)
    {
        $department->delete();
        return response()->json(null, 204);
    }
}