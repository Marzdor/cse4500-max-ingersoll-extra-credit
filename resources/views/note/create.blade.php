@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>{{ $equipment->manufacture->name }} - {{ $equipment->model }}</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-3">
            <div>
                <strong> Hardware Specification</strong>
                <p>
                    CPU: {{ $equipment->CPU }}<br>
                    RAM: {{ $equipment->memory }}<br>
                    Storage{{ $equipment->storage }}
                </p>
                <hr>
                <strong> Purchase Info</strong>
                <p>
                    Invoice#: {{ $equipment->invoice_number }}<br>
                    Price: $ {{ $equipment->price }}<br>
                    Purchase Date: {{ $equipment->purchase_date }}
                </p>
            </div>
            <a class="btn btn-success" href="{{ route('equipment.edit', ['equipment' => $equipment]) }}">Edit</a>
        </div>

        <div class="col-md-9">
            <form action="{{ route('notes.store', ['equipment' => $equipment->id]) }}" method="POST">
                <h3 class="card-title">Add a note</h3>
                @csrf
                <x-adminlte-input name="subject" type="text" placeholder="subject" />
                <x-adminlte-textarea name="content" placeholder="Content ..." />
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>
@stop

@section('css')

@stop

@section('js')
    <script>
        $(document).ready(function() {
            $('.table').DataTable({
                "paging": false,
                "info": false,
                "searching": false
            });
        });
    </script>
@stop
