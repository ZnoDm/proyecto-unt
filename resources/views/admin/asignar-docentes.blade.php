@extends('adminlte::page')

@section('title', 'Docentes')

@section('content_header')
    <h1>Asignar Asesoria</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
        <form action="{{route('admin.docente.asignado')}}" method="POST">
            @csrf
            <input type="hidden" name="docente_id" value="{{$docente->id}}">
            <label for="">Nombre:</label> 
            <p class="form-control">{{$docente->nombre}}</p>
            <label style="font-size: 18px"><input type="checkbox" id="cbox1" name="cbox1" value="1" {{($docente->status == 2) ? '':($docente->status == 0 ? '':'checked')}}> Practicas </label><br>
            <label style="font-size: 18px"><input type="checkbox" id="cbox2" name="cbox2" value="2" {{($docente->status == 1) ? '':($docente->status == 0 ? '':'checked')}}> Tesis </label><br>
            <input type="submit" value="Asignar" class="btn btn-success ">
        </form>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
