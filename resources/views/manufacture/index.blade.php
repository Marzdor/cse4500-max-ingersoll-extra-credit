@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <a href="{{ route('manufactures.create') }}" class="btn btn-success float-right">+ Add</a>
    <h1>Manufacturs</h1>
@stop

@section('content')
    <div>
        @foreach ($manufactures as $item)
            <div style="border: 2px solid black" class="col-md-1 col-sm-1 col-12">

                <h3>{{ $item->equipment->count() }}</h3>
                <p>{{ $item->name }}</p>

                <a href="{{ route('manufactures.show', ['manufacture' => $item]) }}">
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
