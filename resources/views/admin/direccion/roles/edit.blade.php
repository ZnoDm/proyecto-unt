@extends('adminlte::page')

@section('title', 'Roles')

@section('content_header')
    <h1>Editar Rol</h1>
@stop

@section('content')
    @if (session('info'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Éxito!</strong> {{session('info')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <div class="card">
        <div class="card-body">
            {!!Form::model($role,['route'=>['admin.direccion.roles.update',$role],'method'=>'put'])!!}

                @include('admin.direccion.roles.partials.form')
                
                {!! Form::submit('Actualizar Role', ['class'=> 'btn btn-primary mt-2']) !!}

            {!!Form::close()!!}
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop