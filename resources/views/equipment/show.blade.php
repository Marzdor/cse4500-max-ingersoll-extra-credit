@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>
        <a
            href="{{ route('manufactures.show', ['manufacture' => $equipment->manufacture->id]) }}">{{ $equipment->manufacture->name }}</a>
        - {{ $equipment->model }}
        <a
            href="{{ route('categories.show', ['category' => $equipment->category->id]) }}">{{ $equipment->category->name }}</a>
    </h1>
@stop

@section('content')
    <div class="row">
        <div class="col-md-3">
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
            <a class="btn btn-success " href="{{ route('equipment.edit', ['equipment' => $equipment]) }}">Edit</a>
        </div>

        <div class="col-md-9">
            <h3>Notes</h3>
            <div>
                <a href="{{ route('notes.create', ['equipment' => $equipment->id]) }}" class="btn "><i
                        class="fas fa-plus"></i> Add</a>
            </div>
            <table id="note_table" class="table table-sm" style="width:100%">
                <thead>
                    <tr>
                        <th>Subject</th>
                        <th>Content</th>
                        <th>Create Date</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($equipment->notes as $note)
                        <tr>
                            <td>{{ $note->subject }}</td>
                            <td>{{ $note->content }}</td>
                            <td>{{ $note->created_at }}</td>
                            <td>
                                <a class="btn btn-primary btn-xs"
                                    href="{{ route('notes.edit', ['note' => $note->id]) }}">Edit</a>
                                <form action="{{ route('notes.destroy', ['note' => $note->id]) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="_method" value="DELETE" />
                                    <button type="submit" class="btn btn-danger btn-xs">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <h3 class="card-title">Users</h3>
            <table id="user_table" class="table table-sm" style="width:100%">
                <thead>
                    <tr>
                        <th>Name </th>
                        <th>Email</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($equipment->users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td><a class="btn btn-primary btn-xs"
                                    href="{{ route('users.show', ['user' => $user->id]) }}">View</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

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
