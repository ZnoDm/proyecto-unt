@extends('adminlte::page')

@section('title', 'Tesis')

@section('content_header')
    <h1>Tesis Finalizadas</h1>
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
                    <th>ESTADO</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tesis as $te)
                    <tr>
                        <td>{{$te->id}}</td>
                        <td>{{$te->codigo}}</td>
                        <td> 
                            FINALIZADA
                        </td>
                        <td><a href="{{route('admin.tesis.show',$te->id)}}" class="btn btn-primary">MOSTRAR</a></td>
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
