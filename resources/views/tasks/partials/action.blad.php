<!-- resources/views/tasks/partials/actions.blade.php -->
<div class="flex space-x-2">
    <a href="{{ route('tasks.edit', $task->id) }}" class="text-blue-500">Edit</a>
    <form action="{{ route('tasks.destroy', $task->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="text-red-500">Delete</button>
    </form>
</div>

