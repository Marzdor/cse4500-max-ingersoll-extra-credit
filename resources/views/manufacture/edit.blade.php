@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>{{ $manufacture->name }}</h1>
@stop

@section('content')

    <form action="{{ route('manufactures.update', ['manufacture' => $manufacture]) }}" method="POST">
        @csrf


        <h3>Infomation</h3>

        <input type="hidden" name="_method" value="PUT" />

        <x-adminlte-input name="name" label="Manufacture Name" "
                value=" {{ old('name') ?: $manufacture->name }}" />
        <x-adminlte-input name="sales_name" label="Sales Name"
            value="{{ old('sales_name') ?: $manufacture->sales_email }}" />
        <x-adminlte-input name="techsupport_name" label="Tech Name"
            value="{{ old('techsupport_name') ?: $manufacture->techsupport_name }}" />
        <x-adminlte-input name="sales_phone" label="Sales Phone"
            value="{{ old('sales_phone') ?: $manufacture->sales_phone }}" />
        <x-adminlte-input name="techsupport_phone" label="Tech Phone"
            value="{{ old('techsupport_phone') ?: $manufacture->techsupport_phone }}" />
        <x-adminlte-input name="sales_email" label="Sale Email"
            value="{{ old('sales_email') ?: $manufacture->sales_email }}" />
        <x-adminlte-input name="techsupport_email" label="Tech Email"
            value="{{ old('techsupport_email') ?: $manufacture->techsupport_email }}" />

        <button type="Submit" class="btn btn-primary ">Submit</button>
        <a href="{{ route('manufactures.show', ['manufacture' => $manufacture]) }}" class="btn btn-danger">Cancel</a>

    </form>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script></script>
@stop
