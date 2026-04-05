@extends('layouts.app')
@section('content')

<div class="container mt-4">

    <h2>Make a Transfer</h2>

    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif

    @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('transfer.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">From Account</label>
            <select name="from_account_id" class="form-control" required>
                @foreach($client->bankAccounts as $account)
                <option value="{{ $account->id }}">
                    {{ $account->bankAccountNumber }} (Balance: {{ $account->balance }})
                </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">To Account (IBAN)</label>
            <input
                type="text"
                name="to_account_number"
                class="form-control"
                placeholder="Enter IBAN"
                required>
        </div>

        <div class="mb-3">
            <label class="form-label">Amount</label>
            <input
                type="number"
                name="amount"
                step="0.01"
                min="0.01"
                class="form-control"
                required>
        </div>

        <button type="submit" class="btn btn-primary">
            Send Money
        </button>

    </form>

</div>

@endsection