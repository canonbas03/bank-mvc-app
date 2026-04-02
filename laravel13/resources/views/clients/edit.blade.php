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
        <form action="{{ route('clients.update', $client->id) }}" method="POST">
            @csrf
            @method('PATCH')
            <h2>Edit Client</h2>

            <label for="firstName">First Name:</label>
            <input
                type="text"
                name="firstName"
                value="{{ $client->user->firstName}}"
                required>

            <label for="lastName">Last Name:</label>
            <input
                type="text"
                name="lastName"
                value="{{ $client->user->lastName}}"
                required>

            <label for="email">Email:</label>
            <input
                type="email"
                name="email"
                value="{{ $client->user->email}}"
                required>

            <label for="clientEgn">EGN:</label>
            <input
                type="text"
                name="clientEgn"
                value="{{ $client->clientEgn}}"
                required>

            <button type="submit" class="btn mt-4">Edit</button>

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