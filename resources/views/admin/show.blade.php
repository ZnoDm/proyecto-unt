@extends('adminlte::page')

@section('title', 'Docentes')

@section('content_header')
    <h1>Dr. {{$docente->nombre}}</h1>
@stop

@section('content')
    <div class="p-4">
        <h4>PRACTICAS</h4>
        @if ($practicas->count())
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>NOMBRES</th>                            
                            <th>APELLIDOS</th>
                            <th>TELEFONO</th>
                            <th>EMAIL</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($practicas as $practica)
                            <tr>
                                <td>{{$practica->id}}</td>
                                <td>{{$practica->nombre}}</td>
                                <td>{{$practica->apellido}}</td>
                                <td>{{$practica->telefono}}</td>
                                <td>{{$practica->email}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <div class="card-body"><strong>No hay registros</strong></div>
        @endif
    </div>
    <div class="p-4">
        <h4>TESIS</h4>
        @if ($tesis->count())
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombres</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        @else
            <div class="card-body"><strong>No hay registros</strong></div>
        @endif
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
