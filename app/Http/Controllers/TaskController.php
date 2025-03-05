<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class TaskController extends Controller
{
    public function index(Request $request)
    {

        $tasks = Task::where('user_id', auth()->id())
            ->orWhere('assigned_to', auth()->id());


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

        return view('tasks.index', compact('tasks'));
    }

    public function create()
    {
        $users = User::all();
        return view('tasks.create', compact('users'));
    }

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
//            Mail::raw("You have been assigned a new task: {$task->title}",
//                function ($message) use ($assignedUser) {
//                    $message->to($assignedUser->email)->subject("New Task Assigned");
//                });
//        }
        session()->flash('success', 'Task created successfully!');

        return redirect()->route('tasks.index');
    }

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
