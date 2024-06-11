<?php

namespace App\Http\Controllers;

use App\Models\task;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = task::all();
        return view('home', compact('tasks'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'date' => 'required',
        ]);

        $slug = Str::slug($request->input('name'));

        task::create($request->all() + ['slug' => $slug]);
    
        return redirect('/');
    }

    public function show(task $task)
    {
        return view('show', compact('task'));   
    }

    public function edit(task $task)
    {
        //
    }

    public function update(Request $request, task $task)
    {
        //
    }

    public function destroy(task $task)
    {
        $task->delete();
        return back();
    }
    
    public function complete(task $task)
    {
        $task->update([
            'completed' => true
        ]);
        return back();
    }
}
