@extends('layouts.app')
@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <a href="{{ route('clients.dashboard') }}" class="btn btn-outline-secondary mb-3">←</a>

            <div class="card shadow-sm">
                <div class="card-header">
                    Make a Transfer
                </div>

                <div class="card-body">

                    @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                    @endif

                    @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
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
                            <select name="from_account_id" class="form-select" required>
                                @foreach($client->bankAccounts as $account)
                                <option value="{{ $account->id }}">
                                    {{ $account->bankAccountNumber }} ({{ number_format($account->balance, 2) }} &euro;)
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

                        <div class="mb-4">
                            <label class="form-label">Amount</label>
                            <input
                                type="number"
                                name="amount"
                                step="0.01"
                                min="0.01"
                                class="form-control"
                                placeholder="0.00"
                                required>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">
                            Send Money
                        </button>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

@endsection