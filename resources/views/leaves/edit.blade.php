@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Leave Request</h1>
    <form action="{{ route('leaves.update', $leave) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="employee_id">Employee</label>
            <select name="employee_id" class="form-control" required>
                @foreach ($employees as $employee)
                <option value="{{ $employee->id }}" {{ $leave->employee_id == $employee->id ? 'selected' : '' }}>{{ $employee->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="start_date">Start Date</label>
            <input type="date" name="start_date" class="form-control" value="{{ $leave->start_date }}" required>
        </div>
        <div class="form-group">
            <label for="end_date">End Date</label>
            <input type="date" name="end_date" class="form-control" value="{{ $leave->end_date }}" required>
        </div>
        <div class="form-group">
            <label for="type">Type</label>
            <select name="type" class="form-control" required>
                <option value="sick" {{ $leave->type == 'sick' ? 'selected' : '' }}>Sick</option>
                <option value="annual" {{ $leave->type == 'annual' ? 'selected' : '' }}>Annual</option>
                <option value="unpaid" {{ $leave->type == 'unpaid' ? 'selected' : '' }}>Unpaid</option>
            </select>
        </div>
        <div class="form-group">
            <label for="reason">Reason</label>
            <textarea name="reason" class="form-control">{{ $leave->reason }}</textarea>
        </div>
        <div class="form-group">
            <label for="status">Status</label>
            <select name="status" class="form-control" required>
                <option value="pending" {{ $leave->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="approved" {{ $leave->status == 'approved' ? 'selected' : '' }}>Approved</option>
                <option value="rejected" {{ $leave->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
