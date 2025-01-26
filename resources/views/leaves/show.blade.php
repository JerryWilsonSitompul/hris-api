@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Leave Request Details</h1>
    <p><strong>Employee:</strong> {{ $leave->employee->name }}</p>
    <p><strong>Type:</strong> {{ ucfirst($leave->type) }}</p>
    <p><strong>Start Date:</strong> {{ $leave->start_date }}</p>
    <p><strong>End Date:</strong> {{ $leave->end_date }}</p>
    <p><strong>Reason:</strong> {{ $leave->reason ?? 'N/A' }}</p>
    <p><strong>Status:</strong> {{ ucfirst($leave->status) }}</p>
    <a href="{{ route('leaves.edit', $leave) }}" class="btn btn-warning">Edit</a>
    <a href="{{ route('leaves.index') }}" class="btn btn-secondary">Back</a>
</div>
@endsection
