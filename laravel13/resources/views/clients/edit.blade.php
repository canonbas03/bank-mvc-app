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
                    Edit Client Data
                </div>

                <div class="card-body">

                    <h4 class="mb-3">Edit Client</h4>

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form action="{{ route('clients.update', $client->id) }}" method="POST">
                        @csrf
                        @method('PATCH')

                        <div class="mb-3">
                            <label class="form-label">First Name</label>
                            <input
                                type="text"
                                name="firstName"
                                value="{{ $client->user->firstName }}"
                                class="form-control"
                                required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Last Name</label>
                            <input
                                type="text"
                                name="lastName"
                                value="{{ $client->user->lastName }}"
                                class="form-control"
                                required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email</label>
                            <input
                                type="email"
                                name="email"
                                value="{{ $client->user->email }}"
                                class="form-control"
                                required>
                        </div>

                        <div class="mb-4">
                            <label class="form-label">EGN</label>
                            <input
                                type="text"
                                name="clientEgn"
                                value="{{ $client->clientEgn }}"
                                class="form-control"
                                required>
                        </div>

                        <button type="submit" class="btn btn-primary w-100" onclick="return confirm('Are you sure you want to update this client: {{ $client->user->firstName }} {{ $client->user->lastName }}?')">
                            Update Client
                        </button>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

@endsection