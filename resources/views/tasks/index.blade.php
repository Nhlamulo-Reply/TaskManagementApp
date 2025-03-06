<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Task List') }}
        </h2>
    </x-slot>

    <x-container>

        <div class="flex justify-between items-center mb-2">
            <h2 class="text-2xl font-bold text-gray-800"> Filters</h2>
            <a href="{{ route('tasks.create') }}" class="px-4 py-2 bg-blue-600 text-white text-sm font-semibold rounded-lg shadow-md hover:bg-blue-700 transition">
                ➕ Create New Task
            </a>

        </div>


    </x-container>
    <x-container>
        <!-- Success Alert -->
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

        <!-- Filter Task buttons -->

        <!-- Making use of AlphineJs watch funtionality to keep track of the filters in real-time -->
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

        <form method="GET" action="{{ route('tasks.index') }}" class="mb-6">
            @csrf
            <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                <!-- Button Group (Left) -->
                <div class="flex space-x-2 order-1 md:order-none">
                    <!-- Filter Button -->
                    <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition">
                        Filter
                    </button>

                    <!-- Reset Button -->
                    <a href="{{ route('tasks.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded-lg hover:bg-gray-600 transition">
                        Reset
                    </a>
                </div>

                <!-- Search Input (Right) -->
                <div class="w-full md:w-auto order-2 md:order-none">
                    <input type="text" name="search" placeholder="Search tasks..." class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ request('search') }}">
                </div>
            </div>

            <!-- Additional Filters (Status and Due Date) -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                <!-- Status Dropdown -->
                <div>
                    <x-select-dropdown
                        name="status"
                        :options="['pending' => 'Pending', 'in_progress' => 'In Progress', 'completed' => 'Completed']"
                        :selected="request('status')"
                        label="Status"
                        placeholder="Select status"
                    />
                </div>

                <!-- Due Date Input -->
                <div>
                    <input type="date" name="due_date" class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500" value="{{ request('due_date') }}">
                </div>
            </div>
        </form>

        <!-- Task Table -->
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

        <!-- Pagination Links -->
        <div class="mt-4">
            {{ $tasks->links() }}
        </div>
    </x-container>
</x-app-layout>
