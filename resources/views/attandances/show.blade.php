@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Attendance Details</h1>
    <p><strong>Employee:</strong> {{ $attendance->employee->name }}</p>
    <p><strong>Check In:</strong> {{ $attendance->check_in }}</p>
    <p><strong>Check Out:</strong> {{ $attendance->check_out ?? 'N/A' }}</p>
    <p><strong>Check In Location:</strong> {{ $attendance->check_in_location ?? 'N/A' }}</p>
    <p><strong>Check Out Location:</strong> {{ $attendance->check_out_location ?? 'N/A' }}</p>
    @if ($attendance->check_in_photo)
    <img src="{{ asset('storage/' . $attendance->check_in_photo) }}" alt="Check In Photo" style="max-width: 200px;">
    @endif
    @if ($attendance->check_out_photo)
    <img src="{{ asset('storage/' . $attendance->check_out_photo) }}" alt="Check Out Photo" style="max-width: 200px;">
    @endif
    <a href="{{ route('attendances.edit', $attendance) }}" class="btn btn-warning">Edit</a>
    <a href="{{ route('attendances.index') }}" class="btn btn-secondary">Back</a>
</div>
@endsection
