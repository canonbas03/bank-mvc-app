@extends('layouts.app')
@section('content')

<div class="container mt-5 col-md-5">
    <a href="{{ url()->previous() }}" class="btn btn-outline-secondary mb-3"> &#8592; </a>
    <div class="card shadow-sm p-4">
        <h2 class="mb-4 text-center">Register Worker Account</h2>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif


        <form action="{{ route('register.worker') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="firstName" class="form-label">First Name:</label>
                <input
                    type="text"
                    name="firstName"
                    id="firstName"
                    value="{{ old('firstName') }}"
                    class="form-control rounded-0"
                    required>
            </div>

            <div class="mb-3">
                <label for="lastName" class="form-label">Last Name:</label>
                <input
                    type="text"
                    name="lastName"
                    id="lastName"
                    value="{{ old('lastName') }}"
                    class="form-control rounded-0"
                    required>
            </div>

            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <input
                    type="email"
                    name="email"
                    id="email"
                    value="{{ old('email') }}"
                    class="form-control rounded-0"
                    required>
            </div>

            <div class="mb-3">
                <label for="password" class="form-label">Password:</label>
                <input
                    type="password"
                    name="password"
                    id="password"
                    class="form-control rounded-0"
                    required>
            </div>

            <div class="mb-3">
                <label for="password_confirmation" class="form-label">Confirm Password:</label>
                <input
                    type="password"
                    name="password_confirmation"
                    id="password_confirmation"
                    class="form-control rounded-0"
                    required>
            </div>

            <div class="mb-3">
                <label for="salary" class="form-label">Salary:</label>
                <input
                    type="text"
                    name="salary"
                    id="salary"
                    class="form-control rounded-0"
                    required>
            </div>

            <button type="submit" class="btn btn-success w-100 mt-3">Register</button>
        </form>
    </div>
</div>

@endsection