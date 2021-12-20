@extends('adminlte::page')

@section('title', 'Empresas')

@section('content_header')
    <h1>Listado de Empresas</h1>    
    <hr class="mt-3">
@stop

@section('content')

<div class="card">
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>RUC</th>
                    <th>NOMBRE</th>
                    <th>REPRESENTANTE LEGAL</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($empresas as $empresa)
                    <tr>
                        <td>{{$empresa->ruc}}</td>
                        <td>{{$empresa->nombre}}</td>
                        <td>{{$empresa->representante}}</td>
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
