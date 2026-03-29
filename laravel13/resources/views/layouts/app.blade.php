<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ninja Network</title>


</head>

<body>
    @if (session('success'))
    <div id="flash" class="p-4 text-center bg-green-50 text-green-500 font-bold">
        {{ session('success') }}
    </div>
    @endif

    <header>
        <nav>
            <h1>
                Ninja Network
            </h1>

            @guest
            <a href="" class="btn">Login</a>
            <a href="" class="btn">Register</a>
            @endguest

            @auth
            <span class="border-r-2 pr-5">
                Hi there, {{ Auth::user()->name }}
            </span>
            <a href="">Create New Ninja</a>
            <form action="" method="POST" class="m-0">
                @csrf
                <button type="submit" class="btn">Logout</button>
            </form>
            @endauth
        </nav>
    </header>

    <main class="container">
        @yield('content')
    </main>

</body>

</html>