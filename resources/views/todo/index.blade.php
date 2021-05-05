<!DOCTYPE html>
<html lang="en">

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
  <title>Edit</title>
</head>

<body>
  <main class="bg-light px-4 pt-5 vh-100">
    <div class="container-fluid">
      <div class="row">
        <aside class="col-5">
          <section class="card shadow mb-4">
            <div class="card-body">
              <h1 class="fw-bold text-muted">Add new todo</h1>
              <form action="/todos" method="POST">
                @csrf
                <div class="input-group mb-3">
                  <span class="input-group-text fst-italic" id="new-todo-label">add a new todo</span>
                  <input name="todo_title" type="text" class="form-control" placeholder="New Todo" required>
                  <button class="btn btn-outline-secondary" type="submit" id="new-todo-button-addon"><i class="bi bi-plus"></i></button>
                </div>
                <select name="category_id" class="form-select form-select-sm" aria-label=".form-select-sm example" required>
                  <option selected disabled>Select a category</option>
                  @foreach($categories as $category)
                  <option value="{{ $category->id }}">{{ $category->name }}</option>                    
                  @endforeach
                </select>
              </form>
            </div>
          </section>
          <section class="card shadow mb-4">
            <div class="card-body">
              <h1 class="fw-bold text-muted">Categories</h1>

              <table class="table align-middle">
                <tbody>

                  {{-- Categories are going to be listed here... --}}
                  @foreach($categories as $category)                    
                  <tr>
                    <td class="w-100">{{ $category->name }}</td>
                    <td>
                      <div class="d-grid">
                        <a href="#" type="button" class="btn btn-sm btn-outline-secondary disabled"><i class="bi bi-pencil"></i></a>
                      </div>
                    </td>
                  </tr>
                  @endforeach

                </tbody>
              </table>

            </div>
          </section>
        </aside>
        <aside class="col-7">
          <section class="card shadow mb-4">
            <div class="card-body">
              <h1 class="fw-bold text-muted">The todos</h1>
              <table class="table align-middle">
                <tbody>

                  {{-- Todos are going to be listed here... --}}
                  @foreach($todos as $todo)
                  <tr>
                    <td colspan="2" class="w-100">
                      <a href="/todos/{{ $todo->id }}/edit" class="text-decoration-none @if($todo->is_done) text-decoration-line-through @endif">{{ $todo->title }}</a>&nbsp;
                      <span class="badge rounded-pill bg-primary">{{ $todo->category->name }}</span>
                    </td>
                    <td>
                      @if($todo->is_done)
                      <a href="#" class="btn btn-sm btn-primary disabled"><i class="bi bi-check"></i></a>
                      @else
                      <a href="/todos/{{ $todo->id }}/mark-as-done" class="btn btn-sm btn-primary"><i class="bi bi-check"></i></a>
                      @endif
                    </td>
                  </tr>
                  @endforeach

                </tbody>
              </table>
            </div>
          </section>
        </aside>
      </div>
    </div>
  </main>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
</body>

</html>

