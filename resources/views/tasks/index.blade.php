@section('content')
    <div class="container">
        <h2>Task List</h2>


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

        <a href="{{ route('tasks.create') }}" class="btn btn-primary">Create Task</a>
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800">📜 Blog Posts</h2>
            <a  href="{{ route('tasks.create') }}" class="px-4 py-2 bg-blue-600 text-white text-sm font-semibold rounded-lg shadow-md hover:bg-blue-700 transition">
                ➕ Create New Task
            </a>
        </div>

        {{-- Filter Form --}}
        <form method="GET" action="{{ route('tasks.index') }}" class="mt-3">
            @csrf
            <input type="text" name="search" placeholder="Search tasks..." class="form-control mb-2" value="{{ request('search') }}">

            <x-select-dropdown
                name="status"
                :options="['pending' => 'Pending', 'completed' => 'Completed']"
                :selected="request('status')"
                label="Status"
                placeholder="Select status"
            />

            <input type="date" name="due_date" class="form-control mb-2" value="{{ request('due_date') }}">

            <button type="submit" class="btn btn-info">Filter</button>
        </form>

        <x-table :headers="['Title', 'Description', 'Due Date', 'Status', 'Actions']"
                 :data="$tasks->map(function ($task) {
            return [
                'title' => $task->title,
                'description' => $task->description,
                'due_date' => \Carbon\Carbon::parse($task->due_date)->format('Y-m-d'),
                'status' => ucfirst($task->status),
//                'actions' => view('tasks.partials.action', compact('task'))->render(),
            ];
         })"
        />

    </div>
@endsection
