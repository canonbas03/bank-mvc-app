<h1>resources\views\clients\index.blade.php</h1>
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
            <td><a href="{{ route('clients.show', $client->id)}}" class="btn btn-primary">Show</a></td>
            <td><a href="{{ route('clients.edit', $client->id)}}" class="btn btn-primary">Edit</a></td>
            <td>
                <form action="{{route('clients.destroy', $client->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit" onclick="return confirm('Are you sure you want to delete this client: {{$client->user->firstName}} {{$client->user->lastName}}?')">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@endsection