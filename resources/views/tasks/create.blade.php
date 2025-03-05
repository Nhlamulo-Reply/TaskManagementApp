@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Create Task</h2>
        <form action="{{ route('tasks.store') }}" method="POST">
            @csrf
            <label>Title:</label>
            <input type="text" name="title" class="form-control" required>
            <label>Description:</label>
            <textarea name="description" class="form-control"></textarea>
            <label>Due Date:</label>
            <input type="date" name="due_date" class="form-control" required>
            <label>Status:</label>
            <select name="status" class="form-control" required>
                <option value="pending">Pending</option>
                <option value="in_progress">In Progress</option>
                <option value="completed">Completed</option>
            </select>

            <x-user-select-dropdown :users="$users" :selected="old('assigned_to', $task->assigned_to ?? null)" />

            <button type="submit" class="btn btn-success mt-3">Create</button>
        </form>
    </div>
@endsection
