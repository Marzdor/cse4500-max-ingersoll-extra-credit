@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>{{ $equipment->manufacture->name }} - {{ $equipment->model }}</h1>
@stop

@section('content')
    <form action="{{ route('equipment.update', ['equipment' => $equipment->id]) }}" method="POST">
        <h3 class="card-title">Edit equipment</h3>
        @csrf
        <input type="hidden" name="_method" value="PUT" />
        <x-adminlte-select name="manufacture_id" label="Manufacture *">
            @foreach ($manufactures as $item)
                <option value="{{ $item->id }}" {{ $equipment->manufacture_id == $item->id ? 'selected' : '' }}>
                    {{ $item->name }}
                </option>
            @endforeach
        </x-adminlte-select>
        <x-adminlte-select name="category_id" label="Category *">
            @foreach ($categories as $item)
                <option value="{{ $item->id }}" {{ $equipment->category_id == $item->id ? 'selected' : '' }}>
                    {{ $item->name }}
                </option>
            @endforeach
        </x-adminlte-select>
        <x-adminlte-input name="model" label="Model *" value="{{ $equipment->model }}" />
        <x-adminlte-input name="CPU" label="CPU" value="{{ $equipment->CPU }}" />
        <x-adminlte-input name="memory" label="Memory" value="{{ $equipment->memory }}" />
        <x-adminlte-input name="storage" label="Storage" value="{{ $equipment->storage }}" />
        <x-adminlte-input name="invoice_number" label="Invoice Number *" value="{{ $equipment->invoice_number }}" />
        <x-adminlte-input name="price" label="Price *" value="{{ $equipment->price }}" />
        <x-adminlte-input name="purchase_date" label="Purchase Date *" type="date"
            value="{{ $equipment->purchase_date }}" />
        <x-adminlte-select name="user_id" label="Current User">
            <option value="">N/A</option>
            @foreach ($users as $item)
                <option value="{{ $item->id }}" {{ $equipment->users->first()->id == $item->id ? 'selected' : '' }}>
                    {{ $item->name }}</option>
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
