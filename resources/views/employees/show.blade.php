@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $employee->name }}</h1>
    <p><strong>Department:</strong> {{ $employee->department->name }}</p>
    <p><strong>Position:</strong> {{ $employee->position->name }}</p>
    <p><strong>NIK:</strong> {{ $employee->nik }}</p>
    <p><strong>Join Date:</strong> {{ $employee->join_date }}</p>
    @if ($employee->photo_path)
    <img src="{{ asset('storage/' . $employee->photo_path) }}" alt="Employee Photo" style="max-width: 200px;">
    @endif
    <a href="{{ route('employees.edit', $employee) }}" class="btn btn-warning">Edit</a>
    <a href="{{ route('employees.index') }}" class="btn btn-secondary">Back</a>
</div>
@endsection