<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('todo.index', ['todos' => Todo::all(), 'categories' => Category::all()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // New Todo object
        $todo = new Todo;
    
        // Setup new todo with form data
        $todo->title = $request->todo_title;
        $todo->category_id = $request->category_id;
    
        // Save the todo into database
        $todo->save();
    
        return redirect('/');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function edit(Todo $todo)
    {
        return $todo;
        return view('todo.edit', [
            'todo' => $todo,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Todo $todo)
    {
        // Update query statement
        $todo->update([
            'title' => $request->todo_title,
            'category_id' => $request->category_id,
            'is_done' => $request->todo_is_done,
        ]);

        // Redirect
        return redirect('/');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Todo  $todo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Todo $todo)
    {
        $todo->delete();
        return redirect('/');
    }

    public function markAsDone(Todo $todo) {
        $todo->is_done = true;
        $todo->save();
        return redirect('/');
    }

}
