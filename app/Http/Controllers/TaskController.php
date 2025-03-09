<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\TaskAssigned;

class TaskController extends Controller
{


//    public function listUsers()
//    {
//        // Ensure the user is an admin
//        if (!auth()->user()->isAdmin()) {
//            abort(403, 'Unauthorized action.');
//        }
//
//        // Get all users
//        $users = User::all();
//
//        // Return a view with the list of users
//        return view('Admin.view-users', compact('users'));
//    }


    public function listUsers()
    {
        $this->authorize('viewUsers', User::class);
        $users = User::all();
        return view('Admin.view-users', compact('users'));
    }

    public function index(Request $request)
    {
        $tasks = Task::where('user_id', auth()->id())->orWhere('assigned_to', auth()->id());


        if ($request->has('status') && in_array($request->status, ['pending', 'in_progress', 'completed'])) {
            $tasks = $tasks->where('status', $request->status);
        }


        if ($request->has('due_date')) {
            $tasks = $tasks->whereDate('due_date', $request->due_date);
        }

        if ($request->has('search')) {
            $tasks = $tasks->where(function ($q) use ($request) {
                $q->where('title', 'like', "%" . $request->search . "%")
                    ->orWhere('description', 'like', "%" . $request->search . "%");
            });
        }


        $tasks = $tasks->paginate(15);

        // Retain filter and search values in the pagination
        $tasks->appends([
            'status' => $request->status,
            'due_date' => $request->due_date,
            'search' => $request->search,
        ]);

        return view('tasks.index', compact('tasks'));
    }

    // Show the form to create a new task
    public function create()
    {
        $users = User::all();
        return view('tasks.create', compact('users'));
    }

    // Store a new task
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'required|date',
            'status' => 'required|in:pending,in_progress,completed',
            'assigned_to' => 'required|exists:users,id',
        ]);

        $task = Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'due_date' => $request->due_date,
            'status' => $request->status,
            'user_id' => auth()->id(),
            'assigned_to' => $request->assigned_to,
        ]);


//        if ($request->assigned_to) {
//            $assignedUser = User::find($request->assigned_to);
//            Mail::to($assignedUser->email)->send(new TaskAssigned($task));
//        }

        session()->flash('success', 'Task created successfully!');
        return redirect()->route('tasks.index');
    }

    // Show the form to edit a task
    public function edit(Task $task)
    {
        return view('tasks.edit', compact('task'));
    }


    public function update(Request $request, Task $task)
    {

        if ($task->user_id !== auth()->id() && !auth()->user()->isAdmin()) {
            abort(403, 'Unauthorized action.');
        }


        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'required|date',
            'status' => 'required|in:pending,in_progress,completed',
        ]);

        $task->update($request->all());


        return redirect()->route('tasks.index')->with('success', 'Task updated successfully.');
    }


    public function destroy(Task $task)
    {

        if ($task->user_id !== auth()->id() && !auth()->user()->isAdmin()) {
            abort(403, 'Unauthorized action.');
        }

        $task->delete();


        return redirect()->route('tasks.index')->with('success', 'Task deleted successfully.');
    }
}
