@extends('layouts.app')
@section('content')

<div class="container mt-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2>Workers</h2>
        <a href="{{ route('workers.create') }}" class="btn btn-success">Create Worker</a>
    </div>

    <table class="table table-striped table-bordered align-middle text-center">
        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Role</th>
                <th>Salary</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse($workers as $worker)
            <tr>
                <td>{{ $worker->id }}</td>
                <td>{{ $worker->user->firstName }}</td>
                <td>{{ $worker->user->lastName }}</td>
                <td>{{ $worker->user->email }}</td>
                <td>{{ $worker->user->role }}</td>
                <td>{{ $worker->salary }} &euro;</td>
                <td>
                    <div class="d-flex justify-content-center gap-2">
                        <a href="{{ route('workers.edit', $worker->id) }}" class="btn btn-sm btn-primary">Edit</a>
                        <form action="{{ route('workers.destroy', $worker->id) }}" method="POST" class="m-0">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" type="submit"
                                onclick="return confirm('Are you sure you want to delete this worker: {{ $worker->user->firstName }} {{ $worker->user->lastName }}?')">
                                Delete
                            </button>
                        </form>
                    </div>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="7" class="text-center">No workers found.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>

@endsection