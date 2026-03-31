@extends('layout')

@section('content')
<h2>Create Bank Account for Client</h2>

@if(session('success'))
<div class="alert alert-success mt-4">
    {{ session('success') }}
</div>
@endif

<form action="{{ route('bankaccounts.store') }}" method="POST">
    @csrf

    <label for="client_egn">Client EGN:</label>
    <input type="text" name="client_egn" required>

    <label for="bankAccountNumber">Bank Account Number:</label>
    <input type="text" name="bankAccountNumber" required>

    <label for="cardNumber">Card Number:</label>
    <input type="text" name="cardNumber" required>

    <label for="balance">Initial Balance:</label>
    <input type="number" name="balance" step="0.01" required>

    <button type="submit" class="btn mt-4">Create Account</button>

    @if ($errors->any())
    <ul class="px-4 py-2 bg-red-100">
        @foreach ($errors->all() as $error)
        <li class="my-2 text-red-500">{{ $error }}</li>
        @endforeach
    </ul>
    @endif
</form>
@endsection