@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Attendance</h1>
    <form action="{{ route('attendances.store') }}" method="POST" enctype="multipart/form-data">
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
            <label for="check_in">Check In</label>
            <input type="datetime-local" name="check_in" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="check_out">Check Out</label>
            <input type="datetime-local" name="check_out" class="form-control">
        </div>
        <div class="form-group">
            <label for="check_in_location">Check In Location</label>
            <input type="text" name="check_in_location" class="form-control">
        </div>
        <div class="form-group">
            <label for="check_out_location">Check Out Location</label>
            <input type="text" name="check_out_location" class="form-control">
        </div>
        <div class="form-group">
            <label for="check_in_photo">Check In Photo</label>
            <input type="file" name="check_in_photo" class="form-control">
        </div>
        <div class="form-group">
            <label for="check_out_photo">Check Out Photo</label>
            <input type="file" name="check_out_photo" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
