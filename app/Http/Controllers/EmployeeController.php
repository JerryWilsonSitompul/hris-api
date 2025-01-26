<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Department;
use App\Models\Position;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function index()
    {
        return response()->json(data: Employee::with('department', 'position')->get());
        // $employees = Employee::with('department', 'position')->get();
        // return view('employees.index', compact('employees'));
    }

    public function create()
    {
        $departments = Department::all();
        $positions = Position::all();
        return view('employees.create', compact('departments', 'positions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
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

        Employee::create($data);

        return redirect()->route('employees.index')->with('success', 'Employee created successfully.');
    }

    public function show(Employee $employee)
    {
        return view('employees.show', compact('employee'));
    }

    public function edit(Employee $employee)
    {
        $departments = Department::all();
        $positions = Position::all();
        return view('employees.edit', compact('employee', 'departments', 'positions'));
    }

    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'name' => 'required',
            'department_id' => 'required|exists:departments,id',
            'position_id' => 'required|exists:positions,id',
            'nik' => 'required|unique:employees,nik,' . $employee->id,
            'join_date' => 'required|date',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->except('photo');
        if ($request->hasFile('photo')) {
            $data['photo_path'] = $request->file('photo')->store('employee_photos', 'public');
        }

        $employee->update($data);

        return redirect()->route('employees.index')->with('success', 'Employee updated successfully.');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index')->with('success', 'Employee deleted successfully.');
    }
}