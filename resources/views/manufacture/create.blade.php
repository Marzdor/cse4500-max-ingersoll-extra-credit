@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Add a Manufacture</h1>
@stop

@section('content')

    <form action="{{ route('manufactures.store') }}" method="POST">
        @csrf

        <h3>Infomation</h3>

        <x-adminlte-input name="name" label="Manufacture Name" />
        <x-adminlte-input name="sales_name" label="Sales Name" />
        <x-adminlte-input name="techsupport_name" label="Tech Name" />
        <x-adminlte-input name="sales_phone" label="Sales Phone" />
        <x-adminlte-input name="techsupport_phone" label="Tech Phone" />
        <x-adminlte-input name="sales_email" label="Sale Email" />
        <x-adminlte-input name="techsupport_email" label="Tech Email" />

        <button type="Submit" class="btn btn-primary">Submit</button>
        <a href="{{ route('manufactures.index') }}" class="btn btn-danger ">Cancel</a>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script></script>
@stop
