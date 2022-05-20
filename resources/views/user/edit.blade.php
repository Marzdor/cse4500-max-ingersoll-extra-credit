@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>{{ $user->name }}</h1>
@stop

@section('content')
    <form action="{{ route('users.update', ['user' => $user]) }}" method="POST">
        <h3>User Information</h3>
        </div>
        @csrf
        <input type="hidden" name="_method" value="PUT" />
        <x-adminlte-input name="name" label="User Name" fgroup-class="col-md-12"
            value="{{ old('name') ?: $user->name }}" />
        <x-adminlte-input name="email" label="Email" fgroup-class="col-md-12"
            value="{{ old('email') ?: $user->email }}" />
        <button type="Submit" class="btn btn-primary">Submit</button>
        <a href="{{ route('users.show', ['user' => $user]) }}" class="btn btn-danger">Cancel</a>
    </form>
@stop


@section('js')
    <script></script>
@stop
