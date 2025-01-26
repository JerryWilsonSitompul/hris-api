@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Employees</h1>
    <a href="{{ route('employees.create') }}" class="btn btn-primary mb-3">Add Employee</a>
    <table class="table">
        <thead>
            <tr>
                <th>Name</th>
                <th>Department</th>
                <th>Position</th>
                <th>NIK</th>
                <th>Join Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($employees as $employee)
            <tr>
                <td>{{ $employee->name }}</td>
                <td>{{ $employee->department->name }}</td>
                <td>{{ $employee->position->name }}</td>
                <td>{{ $employee->nik }}</td>
                <td>{{ $employee->join_date }}</td>
                <td>
                    <a href="{{ route('employees.show', $employee) }}" class="btn btn-info">View</a>
                    <a href="{{ route('employees.edit', $employee) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('employees.destroy', $employee) }}" method="POST" style="display:inline;">
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