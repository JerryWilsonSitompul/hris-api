@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $department->name }}</h1>
    <a href="{{ route('departments.edit', $department) }}" class="btn btn-warning">Edit</a>
    <a href="{{ route('departments.index') }}" class="btn btn-secondary">Back</a>
</div>
@endsection