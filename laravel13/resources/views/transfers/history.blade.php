@extends('layout')

@section('content')

<h2>Transaction History</h2>

<table class="table">
    <thead>
        <tr>
            <th>Type</th>
            <th>From</th>
            <th>To</th>
            <th>Amount</th>
            <th>Date</th>
        </tr>
    </thead>

    <tbody>
        @foreach($transactions as $tx)
        <tr>
            <td>
                @if(auth()->user()->client->bankAccounts->contains('id', $tx->from_account_id))
                Outgoing
                @else
                Incoming
                @endif
            </td>

            <td>{{ $tx->fromAccount->bankAccountNumber }}</td>
            <td>{{ $tx->toAccount->bankAccountNumber }}</td>
            <td>{{ $tx->amount }}</td>
            <td>{{ $tx->created_at }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection