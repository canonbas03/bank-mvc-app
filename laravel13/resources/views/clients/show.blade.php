@extends('layouts.app')
@section('content')

<div class="container mt-4">
    <h2 class="mb-3">Client Details</h2>

    <div class="mb-3">
        <p><strong>Name:</strong> {{ $client->user->firstName }} {{ $client->user->lastName }}</p>
        <p><strong>Email:</strong> {{ $client->user->email }}</p>
        <p><strong>EGN:</strong> {{ $client->clientEgn }}</p>
        <p><strong>Accounts:</strong> {{ $client->bankAccounts->count() }}</p>
    </div>

    <div class="mb-4 d-flex gap-2">
        <a href="{{ route('clients.edit', $client->id)}}" class="btn btn-primary">Edit</a>

        <form action="{{ route('clients.destroy', $client->id) }}" method="POST" class="m-0">
            @csrf
            @method('DELETE')
            <button class="btn btn-danger" type="submit"
                onclick="return confirm('Are you sure you want to delete this client: {{ $client->user->firstName }} {{ $client->user->lastName }}?')">
                Delete
            </button>
        </form>
    </div>

    <h3>Bank Accounts</h3>
    @if($client->bankAccounts->isEmpty())
    <p>This client has no bank accounts.</p>
    @else
    <ul class="list-group">
        @foreach($client->bankAccounts as $account)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            <span>Account: {{ $account->bankAccountNumber }}</span>
            <span>Balance: {{ $account->balance }} &euro;</span>
        </li>
        @endforeach
    </ul>
    @endif
</div>

@endsection