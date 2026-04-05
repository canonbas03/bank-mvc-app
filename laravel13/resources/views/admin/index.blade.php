@extends('layouts.app')
@section('content')

<div class="container mt-5">
    <h1 class="mb-4 text-center">Admin Dashboard</h1>

    <div class="d-flex justify-content-center gap-4 flex-wrap">
        <!-- Workers Card -->
        <a href="{{ route('workers.index') }}" class="text-decoration-none">
            <div class="card text-white bg-primary rounded-4 shadow-sm p-5 text-center" style="width: 200px; height: 200px; display: flex; align-items: center; justify-content: center;">
                <h4 class="m-0">Workers Dashboard</h4>
            </div>
        </a>

        <!-- Clients Card -->
        <a href="{{ route('clients.index') }}" class="text-decoration-none">
            <div class="card text-white bg-success rounded-4 shadow-sm p-5 text-center" style="width: 200px; height: 200px; display: flex; align-items: center; justify-content: center;">
                <h4 class="m-0">Clients Dashboard</h4>
            </div>
        </a>
    </div>
</div>

@endsection