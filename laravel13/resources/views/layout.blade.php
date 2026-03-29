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


      @guest
      <a href="{{ route('show.login') }}" class="btn">Login</a>

      @endguest

      @auth
      <span class="border-r-2 pr-5">
        Hi there, {{ Auth::user()->firstName }}!
      </span>

      <form action="{{ route('logout') }}" method="POST" class="m-0">
        @csrf
        <button type="submit" class="btn">Logout</button>
      </form>
      @endauth

    </nav>
  </header>
  <div class="container">

    @yield('content')

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.min.js" type="text/js"></script>

</body>

</html>