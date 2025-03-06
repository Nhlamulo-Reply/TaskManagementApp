
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('User Dashboard') }}
        </h2>
    </x-slot>
    <x-container>
        <div class="p-6 text-gray-900">

            <div class="inline-flex rounded-md shadow-xs" role="group">

                <a href="{{ route('tasks.index') }}" class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-s-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700">
                    View Task
                </a>
                <a href="{{ route('tasks.create') }}" class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border-t border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700">
                    Settings
                </a>
            </div>
        </div>
    </x-container>
</x-app-layout>


<div class="p-6 text-gray-900">
    <!-- Button Group -->
    <div class="inline-flex rounded-md shadow-xs" role="group">
        <!-- View Button -->
        <a href="{{ route('tasks.index') }}" class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-s-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700">
            View
        </a>

        <!-- Settings Button -->
        <a href="{{ route('tasks.create') }}" class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border-t border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700">
            Create
        </a>

        {{-- <!-- Messages Button --> --}}
        {{-- <a href="{{ route('task.show', ['task' => $task->id]) }}" class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-e-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700"> --}}
        {{--     Messages --}}
        {{-- </a> --}}
    </div>
</div>
