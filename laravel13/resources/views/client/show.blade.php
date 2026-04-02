@extends('layout')

@section('content')

<h2>Client Details</h2>

<p><strong>Name:</strong> {{ $client->user->firstName }} {{ $client->user->lastName }}</p>
<p><strong>Email:</strong> {{ $client->user->email }}</p>
<p><strong>EGN:</strong> {{ $client->clientEgn }}</p>
<p><strong>Accounts:</strong> {{ $client->bankAccounts->count() }}</p>

<h3>Bank Accounts</h3>

<ul>
    @foreach($client->bankAccounts as $account)
    <li>
        {{ $account->bankAccountNumber }} | Balance: {{ $account->balance }}
    </li>
    @endforeach
</ul>

@endsection