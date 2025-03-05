<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Dashboard') }}
        </h2>
    </x-slot>
    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

                <div class="p-6 text-gray-900">

                    {{ __("You're logged in as a user!") }}

                    <!-- Button Group -->
                    <div class="inline-flex rounded-md shadow-xs" role="group">

                        <!-- View Button -->
                        <a href="{{ route('tasks.index') }}" class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-s-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700">
                            View
                        </a>

                        <!-- Settings Button -->
                        <a href="{{ route('tasks.create') }}" class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border-t border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700">
                            Settings
                        </a>

{{--                        <!-- Messages Button -->--}}
{{--                        <a href="{{ route('task.show', ['task' => $task->id]) }}" class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-e-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700">--}}
{{--                            Messages--}}
{{--                        </a>--}}


                    </div>

                </div>

            </div>

        </div>

    </div>

</x-app-layout>
