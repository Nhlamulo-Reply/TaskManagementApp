
<!-- resources/views/tasks/edit.blade.php -->
{{--@extends('layouts.app')--}}
{{--@section('content')--}}
{{--    <div class="container">--}}
{{--        <h2>Edit Task</h2>--}}
{{--        <form action="{{ route('tasks.update', $task->id) }}" method="POST">--}}
{{--            @csrf--}}
{{--            @method('PUT')--}}
{{--            <label>Title:</label>--}}
{{--            <input type="text" name="title" class="form-control" value="{{ $task->title }}" required>--}}
{{--            <label>Description:</label>--}}
{{--            <textarea name="description" class="form-control">{{ $task->description }}</textarea>--}}
{{--            <label>Due Date:</label>--}}
{{--            <input type="date" name="due_date" class="form-control" value="{{ $task->due_date }}" required>--}}
{{--            <label>Status:</label>--}}
{{--            <select name="status" class="form-control" required>--}}
{{--                <option value="pending" {{ $task->status == 'pending' ? 'selected' : '' }}>Pending</option>--}}
{{--                <option value="in_progress" {{ $task->status == 'in_progress' ? 'selected' : '' }}>In Progress</option>--}}
{{--                <option value="completed" {{ $task->status == 'completed' ? 'selected' : '' }}>Completed</option>--}}
{{--            </select>--}}
{{--            <button type="submit" class="btn btn-primary mt-3">Update</button>--}}
{{--        </form>--}}
{{--    </div>--}}
{{--@endsection--}}


<x-app-layout>

    <x-container>
        <x-filter></x-filter>
    </x-container>

    <div class="mb-3 flex items-center justify-center min-h-screen bg-gray-100">
        <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-lg">
            <a href="{{ route('tasks.index') }}" class="block text-center mb-4 bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Back to Tasks</a>

            <form action="{{ route('tasks.update', $task->id) }}" method="POST">
                @csrf
                @method('PUT')


                <div class="mb-4">
                    <label for="title" class="block text-gray-700">Title:</label>
                    <input type="text" name="title" id="title" class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" value="{{ $task->title }}" required>
                </div>


                <div class="mb-4">
                    <label for="description" class="block text-gray-700">Description:</label>
                    <textarea name="description" id="description" class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>{{ $task->description }}</textarea>
                </div>

                <div class="mb-4">
                    <label for="due_date" class="block text-gray-700">Due Date:</label>
                    <input type="date" name="due_date" id="due_date" class="form-input mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" value="{{ $task->due_date }}" required>
                </div>


                <div class="mb-4">
                    <label for="status" class="block text-gray-700">Status:</label>
                    <select name="status" id="status" class="form-select mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
                        <option value="pending" {{ $task->status == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="in_progress" {{ $task->status == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                        <option value="completed" {{ $task->status == 'completed' ? 'selected' : '' }}>Completed</option>
                    </select>
                </div>

                <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-opacity-50 mt-4">Update</button>
            </form>
        </div>
    </div>


</x-app-layout>


