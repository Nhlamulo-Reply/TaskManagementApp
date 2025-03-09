<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Welcome to Admin Dashboard') }}
        </h2>
    </x-slot>
    <x-container>
        <x-filter></x-filter>
    </x-container>

    <x-container>


        @section('content')
            <div class="container">
                <h1>All Users and Their Tasks</h1>

                @if(count($users) > 0)
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Roles</th>
                            <th>Created Tasks</th>
                            <th>Assigned Tasks</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>
{{--                                    @foreach($user->roles as $role)--}}
{{--                                        {{ $role->name }}<br>--}}
{{--                                    @endforeach--}}

                                </td>
                                <td>
                                    @if($user->tasks->count() > 0)
                                        <ul>
                                            @foreach($user->tasks as $task)
                                                <li>{{ $task->title }} ({{ $task->status }})</li>
                                            @endforeach
                                        </ul>
                                    @else
                                        <p>No tasks created by this user.</p>
                                    @endif
                                </td>
                                <td>
                                    @if($user->assignedTasks->count() > 0)
                                        <ul>
                                            @foreach($user->assignedTasks as $task)
                                                <li>{{ $task->title }} ({{ $task->status }})</li>
                                            @endforeach
                                        </ul>
                                    @else
                                        <p>No tasks assigned to this user.</p>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                @else
                    <p>No users found.</p>
                @endif
            </div>
        @endsection

    </x-container>

</x-app-layout>

