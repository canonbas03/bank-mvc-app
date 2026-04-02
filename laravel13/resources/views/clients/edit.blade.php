@extends('layout')

@section('content')
<style>
    .uper {
        margin-top: 40px;
    }
</style>
<div class="card uper">
    <div class="card-header">
        Edit Client Data
    </div>
    <div class="card-body">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div><br />
        @endif
        <form action="{{ route('update.client') }}" method="POST">
            @csrf

            <h2>Register a new Client</h2>

            <label for="firstName">First Name:</label>
            <input
                type="text"
                name="firstName"
                value="{{ $client->firstName}}"
                required>

            <label for="lastName">Last Name:</label>
            <input
                type="text"
                name="lastName"
                value="{{ $client->lastName}}"
                required>

            <label for="email">Email:</label>
            <input
                type="email"
                name="email"
                value="{{ $client->email}}"
                required>

            <label for="clientEgn">EGN:</label>
            <input
                type="text"
                name="clientEgn"
                value="{{ $client->firstName}}"
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
    </div>
</div>
@endsection