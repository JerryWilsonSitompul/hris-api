@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Attendance</h1>
    <form action="{{ route('attendances.update', $attendance) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="employee_id">Employee</label>
            <select name="employee_id" class="form-control" required>
                @foreach ($employees as $employee)
                <option value="{{ $employee->id }}" {{ $attendance->employee_id == $employee->id ? 'selected' : '' }}>{{ $employee->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="check_in">Check In</label>
            <input type="datetime-local" name="check_in" class="form-control" value="{{ $attendance->check_in }}" required>
        </div>
        <div class="form-group">
            <label for="check_out">Check Out</label>
            <input type="datetime-local" name="check_out" class="form-control" value="{{ $attendance->check_out }}">
        </div>
        <div class="form-group">
            <label for="check_in_location">Check In Location</label>
            <input type="text" name="check_in_location" class="form-control" value="{{ $attendance->check_in_location }}">
        </div>
        <div class="form-group">
            <label for="check_out_location">Check Out Location</label>
            <input type="text" name="check_out_location" class="form-control" value="{{ $attendance->check_out_location }}">
        </div>
        <div class="form-group">
            <label for="check_in_photo">Check In Photo</label>
            <input type="file" name="check_in_photo" class="form-control">
            @if ($attendance->check_in_photo)
            <img src="{{ asset('storage/' . $attendance->check_in_photo) }}" alt="Check In Photo" style="max-width: 200px;">
            @endif
        </div>
        <div class="form-group">
            <label for="check_out_photo">Check Out Photo</label>
            <input type="file" name="check_out_photo" class="form-control">
            @if ($attendance->check_out_photo)
            <img src="{{ asset('storage/' . $attendance->check_out_photo) }}" alt="Check Out Photo" style="max-width: 200px;">
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
