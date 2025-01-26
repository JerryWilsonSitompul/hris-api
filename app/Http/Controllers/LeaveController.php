<?php
namespace App\Http\Controllers;

use App\Models\Leave;
use App\Models\Employee;
use Illuminate\Http\Request;

class LeaveController extends Controller
{
    public function index()
    {
        $leaves = Leave::with('employee')->get();
        return view('leaves.index', compact('leaves'));
    }

    public function create()
    {
        $employees = Employee::all();
        return view('leaves.create', compact('employees'));
    }

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

        Leave::create($request->all());

        return redirect()->route('leaves.index')->with('success', 'Leave request created successfully.');
    }

    public function show(Leave $leave)
    {
        return view('leaves.show', compact('leave'));
    }

    public function edit(Leave $leave)
    {
        $employees = Employee::all();
        return view('leaves.edit', compact('leave', 'employees'));
    }

    public function update(Request $request, Leave $leave)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'type' => 'required|in:sick,annual,unpaid',
            'reason' => 'nullable|string',
            'status' => 'required|in:pending,approved,rejected',
        ]);

        $leave->update($request->all());

        return redirect()->route('leaves.index')->with('success', 'Leave request updated successfully.');
    }

    public function destroy(Leave $leave)
    {
        $leave->delete();
        return redirect()->route('leaves.index')->with('success', 'Leave request deleted successfully.');
    }
}