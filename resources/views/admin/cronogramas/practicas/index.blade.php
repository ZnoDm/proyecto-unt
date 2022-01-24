@extends('adminlte::page')

@section('title', 'Alumnos')

@section('content_header')
<h1>Cronogramas de Practicas</h1>
@stop

@section('content')
<hr class="mt-3">
<div class="row">
    <div class="col-12 mx-3">
        <h6>CREAR NUEVO CRONOGRAMA PRACTICAS</h6>
        <a href="{{route('admin.secretaria.cronoPracticas.create')}}" class="btn btn-info" role="button">Nuevo
            Cronograma</a>
    </div>
</div>
<hr class="mt-3">

@if (session('info'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Éxito!</strong> {{session('info')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

<div class="card">
    <div class="card-body mx-4">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Cronograma ID</th>
                    <th>Periodo</th>
                    <th>Fecha Inicio</th>
                    <th>Fecha Final</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($cronoPracticas as $cronoPractica)
                <tr>
                    <td>{{$cronoPractica->id}}</td>
                    <td>{{$cronoPractica->periodo}}</td>
                    <td>{{$cronoPractica->fecha_inicio}}</td>
                    <td>{{$cronoPractica->fecha_fin}}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="text-center">No existen coincidencias con esos filtros</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="card-footer">
        {{$cronoPracticas->links('vendor.pagination.bootstrap-4')}}
    </div>
</div>
@stop