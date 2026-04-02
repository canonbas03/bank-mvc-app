    @extends('layout')

    @section('content')
    <form action="{{ route('clients.store') }}" method="POST">
        @csrf

        <h2>Register a new Client</h2>

        <label for="firstName">First Name:</label>
        <input
            type="text"
            name="firstName"
            value="{{ old('firstName') }}"
            required>

        <label for="lastName">Last Name:</label>
        <input
            type="text"
            name="lastName"
            value="{{ old('lastName') }}"
            required>

        <label for="email">Email:</label>
        <input
            type="email"
            name="email"
            value="{{ old('email') }}"
            required>

        <label for="password">Password:</label>
        <input
            type="password"
            name="password"
            required>

        <label for="password_confirmation">Password:</label>
        <input
            type="password"
            name="password_confirmation"
            required>

        <label for="clientEgn">EGN:</label>
        <input
            type="text"
            name="clientEgn"
            required>

        <button type="submit" class="btn mt-4">Register</button>

        <!-- validation errors -->
        @if ($errors->any())
        <ul class="px-4 py-2 bg-red-100">
            @foreach ($errors->all() as $error)
            <li class="my-2 text-red-500">{{ $error }}</li>
            @endforeach
        </ul>
        @endif

    </form>
    @endsection