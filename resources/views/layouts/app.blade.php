<!DOCTYPE html>
<html lang="en">

<head>
    <title>Taskslist</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
</head>

<body>
  <div class="">
      <nav class="navbar navbar-expand-lg navbar-light bg-light mb-2">
          <div class="container-fluid">
            <a class="navbar-brand" href="/">Tasklist</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav">
                <li class="nav-item">
                  <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" aria-current="page" href="/">Dashboard</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link {{ Request::is('tasks') ? 'active' : '' }}" aria-current="page" href="/tasks">Tasks</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link {{ Request::is('categories') ? 'active' : '' }}" href="/categories">Categories</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link {{ Request::is('categories-and-tasks') ? 'active' : '' }}" href="/categories-and-tasks">Task by Category</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
  </div>
  <div class="container">
    @yield('content')
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>

</html>