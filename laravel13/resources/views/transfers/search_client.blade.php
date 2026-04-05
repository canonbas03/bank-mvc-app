@extends('layout')

@section('content')

<h2>Find Client</h2>

<form action="{{ route('transfer.selectClient') }}" method="POST">
    @csrf

    <label>Client EGN:</label>
    <input type="text" name="client_egn" class="form-control" required>

    <button class="btn btn-primary mt-2">Load Client</button>
</form>

@endsection