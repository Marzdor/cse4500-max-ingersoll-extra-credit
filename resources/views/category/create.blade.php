@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Create Category</h1>
@stop

@section('content')
    <form action="{{ route('categories.store') }}" method="POST">
        @csrf

        <h3>Infomation</h3>
        <x-adminlte-input name="name" label="Category Name" />
        <button type="Submit" class="btn btn-primary">Submit</button>
        <a href="{{ route('categories.index') }}" class="btn btn-danger ">Cancel</a>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script></script>
@stop
