@extends('layout')

@section('content')

<style>
    .uper {

        margin-top: 40px;

    }
</style>

<div class="uper">

    @if(session()->get('success'))

    <div class="alert alert-success">

        {{ session()->get('success') }}

    </div><br />

    @endif


    <a href="{{ route('students.create')}}" class="btn btn-success">ADD</a>

    <table class="table table-striped">

        <thead>

            <tr>

                <td>ID</td>

                <td>FN</td>

                <td>Student Name</td>

                <td colspan="2">Action</td>

            </tr>

        </thead>

        <tbody>

            @foreach($students as $student)

            <tr>

                <td>{{$student->id}}</td>

                <td>{{$student->fn}}</td>

                <td>{{$student->name}}</td>

                <td><a href="{{ route('students.edit', $student->id)}}" class="btn btn-primary">Edit</a></td>

                <td>

                    <form action="{{ route('students.destroy', $student->id)}}" method="post">

                        @csrf

                        @method('DELETE')

                        <button class="btn btn-danger" type="submit">Delete</button>

                    </form>

                </td>

            </tr>

            @endforeach

        </tbody>

    </table>

    <div>

        @endsection