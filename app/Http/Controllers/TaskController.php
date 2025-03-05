<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::where('user_id', auth()->id())->orWhere('assigned_to', auth()->id())->get();
        return response()->json($tasks);
    }

    public function create()
    {
        return view('tasks.create');
    }

    public function store(Request $request)
    {
      $res =   $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'due_date' => 'required|date',
            'status' => 'required|in:pending,in_progress,completed',
            'assigned_to' => 'required|exists:users,id'
        ]);

        $res['user_is'] = auth()->id();

        Task::create([$res]);

        return redirect()->route('tasks.index')->with('success', 'Task created successfully.');
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



    public function  filter(Request $request)
    {

        $query = Task::where('user_id', auth()->id())->orWhere('assigned_to', auth()->id());


        if ($request->has('status') && in_array($request->status, ['pending', 'in_progress', 'completed'])) {
            $query->where('status', $request->status);
        }


        if ($request->has('due_date')) {
            $query->whereDate('due_date', $request->due_date);
        }

        if ($request->has('search')) {
            $query->where(function($q) use ($request) {
                $q->where('title', 'like', "%" . $request->search . "%")
                    ->orWhere('description', 'like', "%" . $request->search . "%");
            });
        }

        $tasks = $query->paginate(15);

        return response()->json($tasks);
    }
}

