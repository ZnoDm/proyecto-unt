@extends('adminlte::page')

@section('title', 'Alumnos')

@section('content_header')
    <h1>Nuevo Cronograma Practicas</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{route('admin.secretaria.cronoPracticas.store')}}" method="POST">
                @csrf
                <div class="row mx-5">
                    <div class="col-6 my-2 px-2">
                        <label for="fecha_inicio">Fecha Inicio:</label>
                        <input type="date" class="w-full form-control" name="fecha_inicio">
                    </div>
                    <div class="col-6 my-2 px-2">
                        <label for="fecha_fin">Fecha Final:</label>
                        <input type="date" class="w-full form-control" name="fecha_fin">
                    </div>
                    <div class="col-6 my-2 px-2">
                        <label for="periodo">Periodo:</label>
                        <input type="text" class="w-full form-control" name="periodo">
                    </div>
                </div>
                <div class="row mx-5">
                    <div class="col-6 d-grid gap-2">
                        <button type="submit" class="btn btn-success">
                            Guardar
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop