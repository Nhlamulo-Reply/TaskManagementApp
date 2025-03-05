
<!-- resources/views/tasks/edit.blade.php -->
@extends('layouts.app')
@section('content')
    <div class="container">
        <h2>Edit Task</h2>
        <form action="{{ route('tasks.update', $task->id) }}" method="POST">
            @csrf
            @method('PUT')
            <label>Title:</label>
            <input type="text" name="title" class="form-control" value="{{ $task->title }}" required>
            <label>Description:</label>
            <textarea name="description" class="form-control">{{ $task->description }}</textarea>
            <label>Due Date:</label>
            <input type="date" name="due_date" class="form-control" value="{{ $task->due_date }}" required>
            <label>Status:</label>
            <select name="status" class="form-control" required>
                <option value="pending" {{ $task->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="in_progress" {{ $task->status == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                <option value="completed" {{ $task->status == 'completed' ? 'selected' : '' }}>Completed</option>
            </select>
            <button type="submit" class="btn btn-primary mt-3">Update</button>
        </form>
    </div>
@endsection
