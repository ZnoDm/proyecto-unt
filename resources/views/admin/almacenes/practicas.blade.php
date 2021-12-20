@extends('adminlte::page')

@section('title', 'Practicas Pendientes')

@section('content_header')
    <h1>Registro de Practicas</h1>
@stop

@section('content')
<hr class="mt-3">
@if (session('info'))
    <div class="alert alert-success mt-2" x-data="{open:true}" x-show="open">
        {{session('info')}}
    </div>
@endif

<div class="card">
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>COD Alumno</th>
                    <th>COD Practica</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($practicas as $practica)
                    <tr>
                        <td>{{$practica->id}}</td>
                        <td>{{$practica->codigo}}</td>
                        <td>
                            {{$practica->practica_id}}
                        </td>
                        <td><a href="{{route('admin.practica.show',$practica->id)}}" class="btn btn-primary">Mostrar</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
