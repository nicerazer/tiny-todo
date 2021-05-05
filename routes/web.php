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
Route::get('/todos/{todo}/mark-as-done', [TodoController::class , 'markAsDone']);

/*
|--------------------------------------------------------------------------
| HOMEWORK: Todo Category CRUD Routes
|--------------------------------------------------------------------------
*/

