@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <a href="{{ route('users.create') }}" class="btn btn-primary float-right"> + Add</a>
    <h1>Users</h1>
@stop

@section('content')


    <div class="row">
        @foreach ($users as $item)
            <div class="col-md-1 col-sm-1 col-12">
                <div style="border: 2px solid black" class="small-box">
                    <h3>{{ $item->equipment->count() }}</h3>
                    <p>{{ $item->name }}</p>

                    <a href="{{ route('users.show', ['user' => $item]) }}">
                        More info
                    </a>
                </div>
            </div>
        @endforeach
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script></script>
@stop
