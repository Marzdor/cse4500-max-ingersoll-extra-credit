@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Add Equipment</h1>
@stop

@section('content')

    <form action="{{ route('equipment.store') }}" method="POST">
        @csrf

        <h3>Please fill out the form</h3>

        <x-adminlte-select name="manufacture_id" label="Manufacture *">
            @foreach ($manufactures as $item)
                <option value="{{ $item->id }}" {{ old('manufacture_id') == $item->id ? 'selected' : '' }}>
                    {{ $item->name }}</option>
            @endforeach
        </x-adminlte-select>
        <x-adminlte-select name="category_id" label="Category *">
            @foreach ($categories as $item)
                <option value="{{ $item->id }}" {{ old('category_id') == $item->id ? 'selected' : '' }}>
                    {{ $item->name }}
                </option>
            @endforeach
        </x-adminlte-select>
        <x-adminlte-input name="model" label="Model *" value="{{ old('model') }}" />
        <x-adminlte-input name="CPU" label="CPU" value="{{ old('CPU') }}" />
        <x-adminlte-input name="memory" label="Memory" value="{{ old('memory') }}" />
        <x-adminlte-input name="storage" label="Storage" value="{{ old('storage') }}" />
        <x-adminlte-input name="invoice_number" label="Invoice Number *" value="{{ old('invoice_number') }}" />
        <x-adminlte-input name="price" label="Price *" value="{{ old('price') }}" />
        <x-adminlte-input name="purchase_date" label="Purchase Date *" type="date" value="{{ old('purchase_date') }}" />
        <x-adminlte-select name="user_id" label="Current User">
            <option value="">N/A</option>
            @foreach ($users as $item)
                <option value="{{ $item->id }}" {{ old('user_id') == $item->id ? 'selected' : '' }}>
                    {{ $item->name }}
                </option>
            @endforeach
        </x-adminlte-select>

        <button type="Submit" class="btn btn-primary ">Submit</button>
        <a href="{{ url()->previous() }}" class="btn btn-danger">Cancel</a>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script></script>
@stop
