<?php

use App\Http\Controllers\TodoController;
use App\Models\Todo;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Main Todo Page Route
|--------------------------------------------------------------------------
|
*/

// Always redirect / to /todo
Route::redirect('/', '/todos');

Route::resource('todos', TodoController::class)->only(['index', 'store', 'edit', 'update', 'destroy']);

// POST: Routes for marking a todo as done
Route::get('/todos/{id}/mark-as-done', function (Todo $todo) {
    return 'nice';
    $todo->is_done = true;
    $todo->save();
    return redirect('/');
});

/*
|--------------------------------------------------------------------------
| HOMEWORK: Todo Category CRUD Routes
|--------------------------------------------------------------------------
*/

