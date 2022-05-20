@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <a href="{{ route('categories.create') }}" class="btn btn-success float-right">+ Add</a>
    <h1>Categories</h1>
@stop

@section('content')
    <div class="row">
        @foreach ($categories as $item)
            <div style="border: 2px solid black" class="col-md-1 col-sm-1 col-12">

                <h3>{{ $item->equipment->count() }}</h3>
                <p>{{ $item->name }} device</p>

                <a href="{{ route('categories.show', ['category' => $item]) }}" class="small-box-footer">
                    More info
                </a>
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
