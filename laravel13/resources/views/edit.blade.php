@extends('layout')


@section('content')

<style>

  .uper {

    margin-top: 40px;

  }

</style>

<div class="card uper">

  <div class="card-header">

    Edit Student Data

  </div>

  <div class="card-body">

    @if ($errors->any())

      <div class="alert alert-danger">

        <ul>

            @foreach ($errors->all() as $error)

              <li>{{ $error }}</li>

            @endforeach

        </ul>

      </div><br />

    @endif

      <form method="post" action="{{ route('students.update', $student->id) }}">

          <div class="form-group">

              @csrf

              @method('PATCH')

              <label for="fn">FN:</label>

              <input type="text" class="form-control" name="fn" value="{{ $student->fn }}"/>

          </div>

          <div class="form-group">

              <label for="name">Student Name:</label>

              <input type="text" class="form-control" name="name" value="{{ $student->name }}"/>

          </div>

          <button type="submit" class="btn btn-primary">Update Data</button>

      </form>

  </div>

</div>

@endsection

