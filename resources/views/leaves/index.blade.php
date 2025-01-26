@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Leave Requests</h1>
    <a href="{{ route('leaves.create') }}" class="btn btn-primary mb-3">Add Leave Request</a>
    <table class="table">
        <thead>
            <tr>
                <th>Employee</th>
                <th>Type</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($leaves as $leave)
            <tr>
                <td>{{ $leave->employee->name }}</td>
                <td>{{ ucfirst($leave->type) }}</td>
                <td>{{ $leave->start_date }}</td>
                <td>{{ $leave->end_date }}</td>
                <td>{{ ucfirst($leave->status) }}</td>
                <td>
                    <a href="{{ route('leaves.show', $leave) }}" class="btn btn-info">View</a>
                    <a href="{{ route('leaves.edit', $leave) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('leaves.destroy', $leave) }}" method="POST" style="display:inline;">
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
