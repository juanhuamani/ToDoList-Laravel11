<?php

namespace App\Http\Controllers;

use App\Models\task;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = task::all();
        $categories = Category::all();
        return view('home', compact('tasks', 'categories'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('create',compact('categories'));
    }

    public function store(Request $request)
    {  
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'date' => 'required',
            'category' => 'required',
        ]);

        $slug = Str::slug($request->input('name'));

        task::create($request->all() + ['slug' => $slug])->categories()->sync($request->category);
        
        session()->flash('message', 'Task successfully created.');
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

    public function category(Category $category)
    {
        $categoryTask = $category->load(['tasks']) ;
        return view('category', compact('categoryTask'));
    }

    public function search(Request $request)
    {
        $tasks = task::where('name', 'like', '%'.$request->search.'%')->get();
        $categories = Category::all();
        return view('home', compact('tasks', 'categories'));
    }
}
