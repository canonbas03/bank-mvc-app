@extends('layouts.app')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <a href="{{ route('workers.index') }}" class="btn btn-outline-secondary mb-3">
                ← Back
            </a>

            <div class="card shadow-sm">
                <div class="card-header">
                    Edit Worker Data
                </div>

                <div class="card-body">

                    <h4 class="mb-3">Edit Worker</h4>

                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form action="{{ route('workers.update', $worker->id) }}" method="POST">
                        @csrf
                        @method('PATCH')

                        <div class="mb-3">
                            <label class="form-label">First Name:</label>
                            <input type="text" name="firstName"
                                value="{{ $worker->user->firstName }}"
                                class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Last Name:</label>
                            <input type="text" name="lastName"
                                value="{{ $worker->user->lastName }}"
                                class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email:</label>
                            <input type="email" name="email"
                                value="{{ $worker->user->email }}"
                                class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Salary:</label>
                            <input type="text" name="salary"
                                value="{{ $worker->salary }}"
                                class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">
                            Update Worker
                        </button>
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

@endsection