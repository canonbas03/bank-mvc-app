@extends('layout')

@section('content')
<h1>Admin Dashboard</h1>

<a href="{{route('workers.index')}}">Workers dashboard</a>
<a href="{{route('clients.index')}}">Clients dashboard</a>
@endsection