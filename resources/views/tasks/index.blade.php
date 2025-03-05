@extends('layouts.app')

@section('content')
    <h2>Task List</h2>
    <a href="{{ route('tasks.create') }}">Create Task</a>

    <ul>
        @foreach($tasks as $task)
            <li>
                <strong>{{ $task->title }}</strong> - {{ $task->status }}
                @if($task->assignedUser)
                    (Assigned to: {{ $task->assignedUser->name }})
                @endif
                <a href="{{ route('tasks.show', $task) }}">View</a>
                @if(auth()->id() === $task->user_id || auth()->user()->is_admin)
                    <a href="{{ route('tasks.edit', $task) }}">Edit</a>
                    <form method="POST" action="{{ route('tasks.destroy', $task) }}">
                        @csrf @method('DELETE')
                        <button type="submit">Delete</button>
                    </form>
                @endif
            </li>
        @endforeach
    </ul>
@endsection
