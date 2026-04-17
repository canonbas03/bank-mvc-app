@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Clients</h1>
        <a href="{{ route('clients.create') }}" class="btn btn-success">Create Client</a>
    </div>

    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-striped table-bordered align-middle">
        <thead class="table-dark text-center">
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>EGN</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($clients as $client)
            <tr>
                <td>{{ $client->id }}</td>
                <td>{{ $client->user->firstName }}</td>
                <td>{{ $client->user->lastName }}</td>
                <td>{{ $client->user->email }}</td>
                <td>{{ $client->user->role }}</td>
                <td>{{ $client->clientEgn }}</td>
                <td>
                    <div class="d-flex justify-content-center gap-2">
                        <a href="{{ route('clients.show', $client->id) }}" class="btn btn-sm btn-primary">Show</a>
                        <a href="{{ route('clients.edit', $client->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('clients.destroy', $client->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" type="submit"
                                onclick="return confirm('Are you sure you want to delete this client: {{ $client->user->firstName }} {{ $client->user->lastName }}?')">
                                Delete
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="9" class="text-center">No clients found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>

</div>
@endsection