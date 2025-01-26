<?php
namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Attendance;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    // Get all attendances
    public function index()
    {
        $attendances = Attendance::with('employee')->get();
        return response()->json($attendances);
    }

    // Create a new attendance
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

        $attendance = Attendance::create($data);
        return response()->json($attendance, 201);
    }

    // Get a single attendance
    public function show(Attendance $attendance)
    {
        return response()->json($attendance->load('employee'));
    }

    // Update an attendance
    public function update(Request $request, Attendance $attendance)
    {
        $request->validate([
            'employee_id' => 'sometimes|exists:employees,id',
            'check_in' => 'sometimes|date',
            'check_out' => 'sometimes|date|after:check_in',
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
        return response()->json($attendance);
    }

    // Delete an attendance
    public function destroy(Attendance $attendance)
    {
        $attendance->delete();
        return response()->json(null, 204);
    }
}