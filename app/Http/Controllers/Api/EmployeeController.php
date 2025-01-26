<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    // Get all employees
    public function index()
    {
        $employees = Employee::with(['department', 'position'])->get();
        return response()->json($employees);
    }

    // Create a new employee
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'department_id' => 'required|exists:departments,id',
            'position_id' => 'required|exists:positions,id',
            'nik' => 'required|unique:employees',
            'join_date' => 'required|date',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->except('photo');
        if ($request->hasFile('photo')) {
            $data['photo_path'] = $request->file('photo')->store('employee_photos', 'public');
        }

        $employee = Employee::create($data);
        return response()->json($employee, 201);
    }

    // Get a single employee
    public function show(Employee $employee)
    {
        return response()->json($employee->load(['department', 'position']));
    }

    // Update an employee
    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'name' => 'sometimes|string',
            'department_id' => 'sometimes|exists:departments,id',
            'position_id' => 'sometimes|exists:positions,id',
            'nik' => 'sometimes|unique:employees,nik,' . $employee->id,
            'join_date' => 'sometimes|date',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->except('photo');
        if ($request->hasFile('photo')) {
            $data['photo_path'] = $request->file('photo')->store('employee_photos', 'public');
        }

        $employee->update($data);
        return response()->json($employee);
    }

    // Delete an employee
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return response()->json(null, 204);
    }
}