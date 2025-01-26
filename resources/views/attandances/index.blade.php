@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Attendances</h1>
    <a href="{{ route('attendances.create') }}" class="btn btn-primary mb-3">Add Attendance</a>
    <table class="table">
        <thead>
            <tr>
                <th>Employee</th>
                <th>Check In</th>
                <th>Check Out</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($attendances as $attendance)
            <tr>
                <td>{{ $attendance->employee->name }}</td>
                <td>{{ $attendance->check_in }}</td>
                <td>{{ $attendance->check_out ?? 'N/A' }}</td>
                <td>
                    <a href="{{ route('attendances.show', $attendance) }}" class="btn btn-info">View</a>
                    <a href="{{ route('attendances.edit', $attendance) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('attendances.destroy', $attendance) }}" method="POST" style="display:inline;">
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
