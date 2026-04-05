@extends('layouts.app')
@section('content')

<h2>Client Details</h2>

<p><strong>Name:</strong> {{ $client->user->firstName }} {{ $client->user->lastName }}</p>
<p><strong>Email:</strong> {{ $client->user->email }}</p>
<p><strong>EGN:</strong> {{ $client->clientEgn }}</p>
<p><strong>Accounts:</strong> {{ $client->bankAccounts->count() }}</p>
<section>
    <a href="{{ route('clients.edit', $client->id)}}" class="btn btn-primary">Edit</a></td>

    <form action="{{route('clients.destroy', $client->id)}}" method="post">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure you want to delete this client: {{$client->user->firstName}} {{$client->user->lastName}}?')">Delete</button>
    </form>
</section>

<h3>Bank Accounts</h3>

<ul>
    @foreach($client->bankAccounts as $account)
    <li>
        {{ $account->bankAccountNumber }} | Balance: {{ $account->balance }}
    </li>
    @endforeach
</ul>

@endsection