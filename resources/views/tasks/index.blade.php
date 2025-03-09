<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Task List') }}
        </h2>
    </x-slot>

    <x-container>
        <x-filter></x-filter>
    </x-container>
    <x-container>

        @if (session('success'))
            <script>
                Swal.fire({
                    title: 'Success!',
                    text: "{{ session('success') }}",
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
            </script>
        @endif

        <div x-data="{
            search: '{{ request('search') }}',
            status: '{{ request('status') }}',
            dueDate: '{{ request('due_date') }}',
            tasks: {{ $tasks->toJson() }},
            filteredTasks: [],

            init() {
                this.filteredTasks = this.tasks.data;
                this.$watch('search', () => this.filterTasks());
                this.$watch('status', () => this.filterTasks());
                this.$watch('dueDate', () => this.filterTasks());
            },

            filterTasks() {
                this.filteredTasks = this.tasks.data.filter(task => {
                    const matchesSearch = !this.search ||
                        task.title.toLowerCase().includes(this.search.toLowerCase()) ||
                        task.description.toLowerCase().includes(this.search.toLowerCase());

                    const matchesStatus = !this.status || task.status === this.status;
                    const matchesDueDate = !this.dueDate || task.due_date === this.dueDate;
                    return matchesSearch && matchesStatus && matchesDueDate;
                });
            }
        }">

            <form method="GET" action="{{ route('tasks.index') }}" class="mb-6 bg-white p-6 rounded-lg shadow-lg">
                @csrf
                <div class="flex flex-col md:flex-row justify-between items-center gap-4">

                    <div class="flex space-x-2 order-1 md:order-none">
                        <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                            Filter
                        </button>
                        <a href="{{ route('tasks.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 transition">
                            Reset
                        </a>
                    </div>

                    <div class="w-full md:w-auto order-2 md:order-none">
                        <input type="text" name="search" placeholder="Search tasks..."
                               class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                               value="{{ request('search') }}" x-model="search">
                    </div>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                    <div>
                        <x-select-dropdown
                            name="status"
                            :options="['pending' => 'Pending', 'in_progress' => 'In Progress', 'completed' => 'Completed']"
                            :selected="request('status')"
                            label="Status"
                            placeholder="Select status"
                            x-model="status"
                        />
                    </div>
                    <div>
                        <input type="date" name="due_date" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ request('due_date') }}">
                    </div>
                </div>
            </form>

        </div> <!-- Closing div for x-data -->

        <x-table :headers="['Title', 'Description', 'Due Date', 'Status', 'Actions']"
                 :data="$tasks->map(function ($task) {
             return [
                 'title' => $task->title,
                 'description' => $task->description,
                 'due_date' => \Carbon\Carbon::parse($task->due_date)->format('Y-m-d'),
                 'status' => ucfirst($task->status),
                 'actions' => view('tasks.partials.action', compact('task'))->render(),
             ];
         })"
        />

        <div class="mt-4">
            {{ $tasks->links() }}
        </div>
    </x-container>
</x-app-layout>
