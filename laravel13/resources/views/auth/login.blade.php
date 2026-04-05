@extends('layouts.app')
@section('content')

<div class="container mt-5" style="max-width: 400px;">
    <div class="card shadow-sm p-4">
        <h2 class="mb-4 text-center">Log In to Your Account</h2>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input
                    type="email"
                    name="email"
                    id="email"
                    value="{{ old('email') }}"
                    class="form-control"
                    required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input
                    type="password"
                    name="password"
                    id="password"
                    class="form-control"
                    required>
            </div>

            <button type="submit" class="btn btn-dark w-100 mt-3">Log In</button>
        </form>
    </div>
</div>

@endsection