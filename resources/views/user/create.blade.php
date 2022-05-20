@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Add a New User</h1>
@stop

@section('content')
    <form action="{{ route('users.store') }}" method="POST">
        <h3 class="card-title">User Information</h3>
        @csrf
        <x-adminlte-input name="name" label="User Name" fgroup-class="col-md-12" />
        <x-adminlte-input name="email" label="Email" fgroup-class="col-md-12" />

        <button type="Submit" class="btn btn-primary ">Submit</button>
        <a href="{{ route('users.index') }}" class="btn btn-danger">Cancel</a>
    </form>
@stop


@section('js')
    <script></script>
@stop
