<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BANK MVC</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4">
            <a class="navbar-brand" href="/">MVC Bank</a>

            <div class="ms-auto d-flex align-items-center gap-2">

                @guest
                <a href="{{ route('show.login') }}" class="btn btn-outline-light">Login</a>
                @endguest

                @auth
                <span class="text-white me-3">
                    Hi there, {{ Auth::user()->firstName }}!
                </span>

                <form action="{{ route('logout') }}" method="POST" class="m-0">
                    @csrf
                    <button type="submit" class="btn btn-danger">Logout</button>
                </form>
                @endauth
            </div>
        </nav>
    </header>
    <div class="container">
        @yield('content')
    </div>


</body>

</html>