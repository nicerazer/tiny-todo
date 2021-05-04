<?php

use App\Models\Category;
use App\Models\Todo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Main Todo Page Route
|--------------------------------------------------------------------------
|
*/

// Always redirect / to /todo
Route::redirect('/', '/todo');

// Routes for todo:read
Route::get('/todo', function () {
    return view('todo-index', ['todos' => Todo::all(), 'categories' => Category::all()]);
});

// Routes for todo:create
Route::post('/todo', function (Request $request) {
    // New Todo object
    $todo = new Todo;

    // Setup new todo with form data
    $todo->title = $request->todo_title;
    $todo->category_id = $request->category_id;

    // Save the todo into database
    $todo->save();

    return redirect('/');
});

// READ: Routes for todo:edit, todo:delete
Route::get('/todo/{id}/edit', function ($id) {
    return view('todo-edit', [
        'todo' => Todo::find($id) ,
        'categories' => Category::all()
    ]);
});

// POST: Routes for marking a todo as done
Route::get('/todo/{id}/mark-as-done', function ($id) {
    Todo::find($id)->update([ 'is_done' => true ]);
    return redirect('/');
});

// PUT: Routes for todo:update
Route::put('/todo/{id}', function ($id, Request $request) {
    // Update query statement
    Todo::find($id)->update([
        'title' => $request->todo_title,
        'category_id' => $request->category_id,
        'is_done' => $request->todo_is_done,
    ]);

    // Redirect
    return redirect('/');
});

// Routes for todo:delete
Route::delete('/todo/{id}', function ($id) {
    Todo::destroy($id);
    return redirect('/');
});

/*
|--------------------------------------------------------------------------
| HOMEWORK: Todo Category CRUD Routes
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';
