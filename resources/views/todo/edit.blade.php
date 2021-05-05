<!DOCTYPE html>
<html lang="en">

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
  <title>Edit</title>
</head>

<body>
  <main class="bg-secondary bg-gradient px-4 vh-100">
    <div class="h-100 container">
      <div class="h-100 row justify-content-center align-items-center">
        <div class="col-7">
          <div class="card">
            <div class="card-body">
              <!-- Todo Title -->
              <div class="width-full d-flex mb-4 align-items-center justify-content-between">
                <h1 class="fw-bold text-muted m-0">Edit this todo</h1>
                <a href="/" class="btn btn-sm btn-outline-secondary">Go Back</a>
              </div>

              <form id="updateTodoForm" method="POST" action="{{ route('todos.update', $todo->id ) }}">
                @csrf
                @method('PUT')
                <!-- Todo Title -->
                <div class="mb-3">
                  <label class="form-label">Todo title (old; {{ $todo->title }})</label>
                  <input value="{{ $todo->title }}" name="todo_title" class="form-control" placeholder="Enter new todo title">
                </div>

                <!-- Inline select inputs -->
                <div class="row">

                  <!-- Todo Category -->
                  <div class="col-8 mb-3">
                    <label class="form-label">Category</label>
                    <select name="category_id" class="form-select" required>

                      @foreach($categories as $category)
                      <option @if($todo->category_id === $category->id) selected @endif value="{{ $category->id }}">{{ $category->name }}</option>
                      @endforeach

                    </select>
                  </div>

                  <!-- Todo *isDone* -->
                  <div class="col-4 mb-3">
                    <label class="form-label">Is the task done?</label>
                    <select name="todo_is_done" class="form-select" required>
                      <option @if($todo->is_done) selected @endif value="1">Yep</option>
                      <option @if(!$todo->is_done) selected @endif value="0">Not yet</option>
                    </select>
                  </div>

                </div>
              </form>

              <!-- Choices of Buttons -->
              <div class="d-flex w-100 justify-content-between">
                <form name="deleteTodoForm" method="POST" action="{{ route('todos.destroy', $todo->id ) }}">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-outline-danger"><i class="bi bi-trash"></i></button>
                </form>
                <button form="updateTodoForm" class="btn btn-primary">Update <i class="bi bi-box-arrow-up"></i></button>
              </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</body>

</html>
