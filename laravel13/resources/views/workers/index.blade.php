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
            <td>Salary</td>
            <td colspan="2">Action</td>
        </tr>
    </thead>
    <tbody>
        @foreach($workers as $worker)
        <tr>
            <td>{{$worker->id}}</td>
            <td>{{$worker->user->firstName}}</td>
            <td>{{$worker->user->lastName}}</td>
            <td>{{$worker->user->email}}</td>
            <td>{{$worker->user->role}}</td>
            <td>{{$worker->salary}}</td>
            <td><a href="{{route('workers.edit', $worker->id)}}" class="btn btn-primary">Edit</a></td>
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