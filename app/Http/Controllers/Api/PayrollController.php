<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Payroll;
use Illuminate\Http\Request;

class PayrollController extends Controller
{
    // Get all payrolls
    public function index()
    {
        $payrolls = Payroll::with('employee')->get();
        return response()->json($payrolls);
    }

    // Create a new payroll
    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'basic_salary' => 'required|numeric',
            'allowances' => 'required|numeric',
            'deductions' => 'required|numeric',
            'net_salary' => 'required|numeric',
            'payroll_date' => 'required|date',
        ]);

        $payroll = Payroll::create($request->all());
        return response()->json($payroll, 201);
    }

    // Get a single payroll
    public function show(Payroll $payroll)
    {
        return response()->json($payroll->load('employee'));
    }

    // Update a payroll
    public function update(Request $request, Payroll $payroll)
    {
        $request->validate([
            'employee_id' => 'sometimes|exists:employees,id',
            'basic_salary' => 'sometimes|numeric',
            'allowances' => 'sometimes|numeric',
            'deductions' => 'sometimes|numeric',
            'net_salary' => 'sometimes|numeric',
            'payroll_date' => 'sometimes|date',
        ]);

        $payroll->update($request->all());
        return response()->json($payroll);
    }

    // Delete a payroll
    public function destroy(Payroll $payroll)
    {
        $payroll->delete();
        return response()->json(null, 204);
    }
}