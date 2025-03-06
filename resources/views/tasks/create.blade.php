

<x-app-layout>
    <div class="container">
        <a href="{{ route('tasks.create') }}" class="btn btn-primary">Create Task</a>
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
    </x-app-layout>
