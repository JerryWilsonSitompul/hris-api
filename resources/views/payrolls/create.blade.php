@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Payroll</h1>
    <form action="{{ route('payrolls.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="employee_id">Employee</label>
            <select name="employee_id" class="form-control" required>
                @foreach ($employees as $employee)
                <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="basic_salary">Basic Salary</label>
            <input type="number" step="0.01" name="basic_salary" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="allowances">Allowances</label>
            <input type="number" step="0.01" name="allowances" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="deductions">Deductions</label>
            <input type="number" step="0.01" name="deductions" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="net_salary">Net Salary</label>
            <input type="number" step="0.01" name="net_salary" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="payroll_date">Payroll Date</label>
            <input type="date" name="payroll_date" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
