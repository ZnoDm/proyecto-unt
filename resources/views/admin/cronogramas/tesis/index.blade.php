@extends('adminlte::page')

@section('title', 'Alumnos')

@section('content_header')
    <h1>Cronogramas de Tesis</h1>
@stop

@section('content')
    <hr class="mt-3">
    <div class="row">
        <div class="col-12 mx-3">
            <h6>CREAR NUEVO CRONOGRAMA TESIS</h6>
            <a href="{{route('admin.secretaria.cronoTesis.create')}}" class="btn btn-info" role="button">Nuevo Cronograma</a>
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
                    @forelse ($cronoTesis as $cronoTesi)
                    <tr>
                        <td>{{$cronoTesi->id}}</td>
                        <td>{{$cronoTesi->periodo}}</td>
                        <td>{{$cronoTesi->fecha_inicio}}</td>
                        <td>{{$cronoTesi->fecha_fin}}</td>
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
            {{$cronoTesis->links('vendor.pagination.bootstrap-4')}}
        </div>
    </div>
@stop