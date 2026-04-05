@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <a href="{{ url()->previous() }}" class="btn btn-outline-secondary mb-3">
                ←
            </a>

            <div class="card shadow-sm">
                <div class="card-header">
                    Register New Client
                </div>

                <div class="card-body">

                    <h4 class="mb-3">Create Client</h4>

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form action="{{ route('clients.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">First Name</label>
                            <input type="text" name="firstName"
                                value="{{ old('firstName') }}"
                                class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Last Name</label>
                            <input type="text" name="lastName"
                                value="{{ old('lastName') }}"
                                class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email"
                                value="{{ old('email') }}"
                                class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password"
                                class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Confirm Password</label>
                            <input type="password" name="password_confirmation"
                                class="form-control" required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">EGN</label>
                            <input type="text" name="clientEgn"
                                class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-success w-100">
                            Create Client
                        </button>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

@endsection