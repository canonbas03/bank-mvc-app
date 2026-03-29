<h1>bank-mvc-app\laravel13\resources\views\worker\index.blade.php</h1>
@extends('layout')

@section('content')
<table class="table table-striped">
    <thead>
        <tr>
            <td>ID</td>
            <td>First Name</td>
            <td>Last Name</td>
            <td>Email</td>
            <td>Role</td>
            <td>EGN</td>
            <td>IBAN</td>
            <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($clients as $client)
        <tr>
            <td>{{$client->id}}</td>
            <td>{{$client->user->firstName}}</td>
            <td>{{$client->user->lastName}}</td>
            <td>{{$client->user->email}}</td>
            <td>{{$client->user->role}}</td>
            <td>{{$client->clientEgn}}</td>
            <td>{{$client->bankAccountNumber}}</td>
            <td><a href="" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection