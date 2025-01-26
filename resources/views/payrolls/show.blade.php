@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Payroll Details</h1>
    <p><strong>Employee:</strong> {{ $payroll->employee->name }}</p>
    <p><strong>Basic Salary:</strong> {{ number_format($payroll->basic_salary, 2) }}</p>
    <p><strong>Allowances:</strong> {{ number_format($payroll->allowances, 2) }}</p>
    <p><strong>Deductions:</strong> {{ number_format($payroll->deductions, 2) }}</p>
    <p><strong>Net Salary:</strong> {{ number_format($payroll->net_salary, 2) }}</p>
    <p><strong>Payroll Date:</strong> {{ $payroll->payroll_date }}</p>
    <a href="{{ route('payrolls.edit', $payroll) }}" class="btn btn-warning">Edit</a>
    <a href="{{ route('payrolls.index') }}" class="btn btn-secondary">Back</a>
</div>
@endsection
