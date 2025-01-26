@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Payroll</h1>
    <form action="{{ route('payrolls.update', $payroll) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="employee_id">Employee</label>
            <select name="employee_id" class="form-control" required>
                @foreach ($employees as $employee)
                <option value="{{ $employee->id }}" {{ $payroll->employee_id == $employee->id ? 'selected' : '' }}>{{ $employee->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="basic_salary">Basic Salary</label>
            <input type="number" step="0.01" name="basic_salary" class="form-control" value="{{ $payroll->basic_salary }}" required>
        </div>
        <div class="form-group">
            <label for="allowances">Allowances</label>
            <input type="number" step="0.01" name="allowances" class="form-control" value="{{ $payroll->allowances }}" required
