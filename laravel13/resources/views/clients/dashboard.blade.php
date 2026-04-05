@extends('layouts.app')
@section('content')

<div class="container mt-4">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="m-0">Client Dashboard</h2>

        <a href="{{ route('transfer.create') }}" class="btn btn-dark">
            Transfer Money
        </a>
    </div>

    <!-- Client Info Card -->
    <div class="card shadow-sm mb-4">
        <div class="card-body">
            <p><strong>Name:</strong> {{ $client->user->firstName }} {{ $client->user->lastName }}</p>
            <p><strong>Email:</strong> {{ $client->user->email }}</p>
            <p><strong>EGN:</strong> {{ $client->clientEgn }}</p>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="row mb-4">
        <div class="col-md-6">
            <div class="card text-white bg-primary shadow-sm">
                <div class="card-body text-center">
                    <h5>Accounts</h5>
                    <h3>{{ $client->bankAccounts->count() }}</h3>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card text-white bg-success shadow-sm">
                <div class="card-body text-center">
                    <h5>Total Balance</h5>
                    <h3>{{ $client->bankAccounts->sum('balance') }} &euro;</h3>
                </div>
            </div>
        </div>
    </div>

    <!-- Bank Accounts Table -->
    <div class="card shadow-sm">
        <div class="card-header">
            Bank Accounts
        </div>
        <div class="card-body">
            @if($client->bankAccounts->isEmpty())
            <p>No bank accounts found.</p>
            @else
            <table class="table table-bordered align-middle text-center">
                <thead class="table-dark">
                    <tr>
                        <th>Account Number</th>
                        <th>Balance</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($client->bankAccounts as $account)
                    <tr>
                        <td>{{ $account->bankAccountNumber }}</td>
                        <td>{{ $account->balance }} &euro;</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @endif
        </div>
    </div>

</div>

@endsection