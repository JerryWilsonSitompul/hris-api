@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Payrolls</h1>
    <a href="{{ route('payrolls.create') }}" class="btn btn-primary mb-3">Add Payroll</a>
    <table class="table">
        <thead>
            <tr>
                <th>Employee</th>
                <th>Basic Salary</th>
                <th>Allowances</th>
                <th>Deductions</th>
                <th>Net Salary</th>
                <th>Payroll Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($payrolls as $payroll)
            <tr>
                <td>{{ $payroll->employee->name }}</td>
                <td>{{ number_format($payroll->basic_salary, 2) }}</td>
                <td>{{ number_format($payroll->allowances, 2) }}</td>
                <td>{{ number_format($payroll->deductions, 2) }}</td>
                <td>{{ number_format($payroll->net_salary, 2) }}</td>
                <td>{{ $payroll->payroll_date }}</td>
                <td>
                    <a href="{{ route('payrolls.show', $payroll) }}" class="btn btn-info">View</a>
                    <a href="{{ route('payrolls.edit', $payroll) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('payrolls.destroy', $payroll) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
