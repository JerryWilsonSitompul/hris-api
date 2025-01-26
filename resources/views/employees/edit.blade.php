@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Employee</h1>
    <form action="{{ route('employees.update', $employee) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" class="form-control" value="{{ $employee->name }}" required>
        </div>
        <div class="form-group">
            <label for="department_id">Department</label>
            <select name="department_id" class="form-control" required>
                @foreach ($departments as $department)
                <option value="{{ $department->id }}" {{ $employee->department_id == $department->id ? 'selected' : '' }}>{{ $department->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="position_id">Position</label>
            <select name="position_id" class="form-control" required>
                @foreach ($positions as $position)
                <option value="{{ $position->id }}" {{ $employee->position_id == $position->id ? 'selected' : '' }}>{{ $position->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="nik">NIK</label>
            <input type="text" name="nik" class="form-control" value="{{ $employee->nik }}" required>
        </div>
        <div class="form-group">
            <label for="join_date">Join Date</label>
            <input type="date" name="join_date" class="form-control" value="{{ $employee->join_date }}" required>
        </div>
        <div class="form-group">
            <label for="photo">Photo</label>
            <input type="file" name="photo" class="form-control">
            @if ($employee->photo_path)
            <img src="{{ asset('storage/' . $employee->photo_path) }}" alt="Employee Photo" style="max-width: 200px;">
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection