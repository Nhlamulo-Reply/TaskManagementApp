<div class="p-6 text-gray-900 flex justify-center">
    <!-- Button Group -->
    <div class="inline-flex rounded-md shadow-xs" role="group">
        <!-- View Button -->
        <a href="{{ route('tasks.index') }}" class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-gray-200 rounded-s-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700">
            View Tasks
        </a>

        <!-- Create Button -->
        <a href="{{ route('tasks.create') }}" class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border-t border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700">
            Create Task
        </a>

        @if(auth()->user()->isAdmin())
            <a href="{{ route('admin.view-users') }}" class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border-t border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700">
                View Users
            </a>
        @endif

        @if(auth()->user()->isAdmin())
            <a href="{{ route('admin.manage-users') }}" class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border-t border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700">
                Manage Users
            </a>
        @endif

        @if(auth()->user()->isAdmin())
            <a href="{{ route('admin.view-logs') }}" class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border-t border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700">
                View Logs
            </a>
        @endif

        <a href="{{ route('tasks.create') }}" class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border-t border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700">
            Settings
        </a>

        <a href="{{ route('admin.notifications') }}" class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border-t border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700">
            Notifications
        </a>
    </div>
</div>
