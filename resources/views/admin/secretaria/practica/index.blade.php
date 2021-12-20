@extends('adminlte::page')

@section('title', 'Practicas Pendientes')
@section('content_header')
    <h3 class="d-flex">{{strtoupper('practicas Pendientes de Aprobacion')}}</h3>
@stop
@section('content')
<hr class="mt-3">
<div>
    <h6>FILTROS</h6>
    <form action="" method="GET" >
        <div class="row my-4 gap-4">
            <div class="col-2">
                    <label for="porfecha" style="font-weight: 500!important" class="d-block"> Fecha </label>
                    <select id="porfecha" name="porfecha" class="form-control form-select w-full" aria-label="Default select example">
                        <option value="1" {{($porfecha == 1)?'selected':''}}>Todos</option>
                        <option value="2" {{($porfecha == 2)?'selected':''}}>Hace un semana</option>
                        <option value="3" {{($porfecha == 3)?'selected':''}}>Hace un mes</option>
                        <option value="3" {{($porfecha == 4)?'selected':''}}>Hace 3 meses</option>
                        <option value="3" {{($porfecha == 5)?'selected':''}}>Hace un año</option>
                    </select>
                    <small id="emailHelp" class="form-text text-muted">Filtro fecha.</small>
            </div>
            <div class="col-2">
                <label for="pordetalle" style="font-weight: 500!important" class="d-block"> Detalle </label>
                <select id="pordetalle" name="pordetalle" class="form-control form-select w-full" aria-label="Default select example">
                    <option value="1" {{($pordetalle == 1)?'selected':''}}>Todos</option>
                    <option value="2" {{($pordetalle == 2)?'selected':''}}>Solicitud</option>
                    <option value="3" {{($pordetalle == 3)?'selected':''}}>Informe Final</option>
                </select>
                <small id="emailHelp" class="form-text text-muted">Filtro detalle.</small>
        </div>
            <div class="col-3">
                    <label for="poralumno" style="font-weight: 500!important" class="d-block">Alumno</label>
                    <input type="search" placeholder="Busqueda por Alumno" id="poralumno" name="poralumno" class="w-full form-control" aria-label="search" value="{{$poralumno}}">
                    <small id="emailHelp" class="form-text text-muted">Filtro alumno.</small>
            </div>
            <div class="col-3">
                <label for="pordocente" style="font-weight: 500!important" class="d-block">Docente</label>
                <input type="search" placeholder="Busqueda por Docente" id="pordocente" name="pordocente" class="w-full form-control" aria-label="search" value="{{$pordocente}}">
                <small id="emailHelp" class="form-text text-muted">Filtro docente.</small>
                
            </div>
            <div class="col-2" >         
                <div style="margin-top: 31px"><button type="submit" class="btn btn-success ml-2"><i class="fas fa-search"></i></button></div>
            </div>
            <div class="col-12">
                    {{--ELIMINAR FILTROS--}}
                <a class="btn btn-danger mt-4" href="{{route('admin.secretaria.practicas')}}" role="button">ELIMINAR FILTROS</a>
            </div>
        </div>
    </form>
</div>
<hr class="my-3">

@if (session('info'))
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        {{session('info')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
    </div>
@endif

<div class="card">
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>                    
                    <th>
                        @if ($orden=='asc')
                            <a href="{{url('admin/secretaria/practicas?porfecha='.$porfecha.'&pordetalle='.$pordetalle.'&poralumno='.$poralumno.'&pordocente='.$pordocente.'&filtro=created_at&orden=desc')}}"><i class="fas fa-angle-down"></i></a>
                        @else
                            <a href="{{url('admin/secretaria/practicas?porfecha='.$porfecha.'&pordetalle='.$pordetalle.'&poralumno='.$poralumno.'&pordocente='.$pordocente.'&filtro=created_at&orden=asc')}}">
                                <i class="fas fa-chevron-up"></i></a>
                        @endif
                        &nbsp;&nbsp;Fecha
                    </th>
                    <th>COD Alumno</th>
                    <th>Alumno</th>
                    <th>COD Docente</th>
                    <th>Docente</th>
                    <th>Detalle</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>                    
                @forelse ($practicas as $practica)
                    <tr>                        
                        <td>{{date('Y-m-d',strtotime($practica->created_at))}}</td>
                        <td>{{$practica->alumno->id}}</td>  
                        <td>{{$practica->alumno->alumno_apellido.' '.$practica->alumno->alumno_nombre}}</td>                         
                        <td>{{$practica->docente->id}}</td>
                        <td>{{$practica->docente->docente_apellido.' '.$practica->docente->docente_nombre}}</td> 
                        <td> 
                            @switch($practica->practica_status)
                                @case(1)
                                SOLICITUD DE PRACTICA
                                    @break
                                @case(4)
                                INFORME FINAL
                                    @break
                                @default
                                    Error
                                @break
                            @endswitch
                        </td>
                        <td><a href="{{route('admin.secretaria.practica.revision',$practica->id)}}" class="btn btn-success"><i class="fas fa-eye"></i></a></td>
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
        {{$practicas->links('vendor.pagination.bootstrap-4')}}
    </div>
    
</div>
@stop
