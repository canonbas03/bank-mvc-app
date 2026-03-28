<!DOCTYPE html>

<html lang="en">

<head>

  <meta charset="UTF-8">

  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title>Laravel 13 CRUD Tutorial</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

</head>

<body>
  <header>
    <nav>
      <h1>Dashboard</h1>


      <a href="{{ route('show.login') }}" class="btn btn-danger">Login</a>
      <a href="{{ route('show.login') }}" class="btn">Register</a>



    </nav>
  </header>
  <div class="container">

    @yield('content')

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" type="text/js"></script>

</body>

</html>