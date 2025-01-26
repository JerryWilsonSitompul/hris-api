<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\Employee;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function index()
    {
        $attendances = Attendance::with('employee')->get();
        return view('attendances.index', compact('attendances'));
    }

    public function create()
    {
        $employees = Employee::all();
        return view('attendances.create', compact('employees'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'check_in' => 'required|date',
            'check_out' => 'nullable|date|after:check_in',
            'check_in_location' => 'nullable|string',
            'check_out_location' => 'nullable|string',
            'check_in_photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'check_out_photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->except(['check_in_photo', 'check_out_photo']);

        if ($request->hasFile('check_in_photo')) {
            $data['check_in_photo'] = $request->file('check_in_photo')->store('attendance_photos', 'public');
        }

        if ($request->hasFile('check_out_photo')) {
            $data['check_out_photo'] = $request->file('check_out_photo')->store('attendance_photos', 'public');
        }

        Attendance::create($data);

        return redirect()->route('attendances.index')->with('success', 'Attendance recorded successfully.');
    }

    public function show(Attendance $attendance)
    {
        return view('attendances.show', compact('attendance'));
    }

    public function edit(Attendance $attendance)
    {
        $employees = Employee::all();
        return view('attendances.edit', compact('attendance', 'employees'));
    }

    public function update(Request $request, Attendance $attendance)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'check_in' => 'required|date',
            'check_out' => 'nullable|date|after:check_in',
            'check_in_location' => 'nullable|string',
            'check_out_location' => 'nullable|string',
            'check_in_photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'check_out_photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $data = $request->except(['check_in_photo', 'check_out_photo']);

        if ($request->hasFile('check_in_photo')) {
            $data['check_in_photo'] = $request->file('check_in_photo')->store('attendance_photos', 'public');
        }

        if ($request->hasFile('check_out_photo')) {
            $data['check_out_photo'] = $request->file('check_out_photo')->store('attendance_photos', 'public');
        }

        $attendance->update($data);

        return redirect()->route('attendances.index')->with('success', 'Attendance updated successfully.');
    }

    public function destroy(Attendance $attendance)
    {
        $attendance->delete();
        return redirect()->route('attendances.index')->with('success', 'Attendance deleted successfully.');
    }
}