

<x-app-layout>

    <x-container>
        <x-filter></x-filter>
    </x-container>

    <div class="mb-3 flex items-center justify-center min-h-screen bg-gray-100">
        <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-lg">
            <a  class="block text-center mb-4 bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-600">Create Task</a>
            <form action="{{ route('tasks.store') }}" method="POST" class="space-y-4">
                @csrf

                <div>
                    <label class="block font-medium text-gray-700">Title:</label>
                    <input type="text" name="title" class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>

                <div>
                    <label class="block font-medium text-gray-700">Description:</label>
                    <textarea name="description" class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                </div>

                <div>
                    <label class="block font-medium text-gray-700">Due Date:</label>
                    <input type="date" name="due_date" class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                </div>

                <div>
                    <label class="block font-medium text-gray-700">Status:</label>
                    <select name="status" class="w-full p-2 border rounded focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        <option value="pending">Pending</option>
                        <option value="in_progress">In Progress</option>
                        <option value="completed">Completed</option>
                    </select>
                </div>

                <div>
                    <x-user-select-dropdown :users="$users" :selected="old('assigned_to', $task->assigned_to ?? null)" />
                </div>

                <button type="submit" class="w-full bg-green-500 text-white py-2 px-4 rounded hover:bg-green-600">Create</button>
            </form>
        </div>
    </div>

    </x-app-layout>
