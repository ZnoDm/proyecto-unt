@extends('adminlte::page')

@section('title', 'Roles')

@section('content_header')
<div class="d-flex">
    <h1 class="mr-auto">Lista de roles</h1>
    <a href="{{route('admin.direccion.roles.create')}}" class="btn btn-info">CREAR ROL</a>
</div>
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
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th colspan="2" class="text-center">Acciones</th>
                    </tr>
                </thead>

                <tbody>

                    @forelse ($roles as $role)
                        <tr>
                            <td>{{$role->id}}</td>
                            <td>{{$role->name}}</td>

                            <td width="10px">
                                <a class="btn btn-success btn-sm" href="{{route('admin.direccion.roles.edit',$role)}}"><i class="fas fa-edit"></i></a>
                            </td>

                            <td width="10px">
                                <form action="{{route('admin.direccion.roles.destroy',$role)}}" method="post">
                                @method('delete')
                                @csrf
                                <button type="submit" class="btn btn-danger btn-sm"><i class="far fa-trash-alt"></i></button>

                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr> <td colspan="4">No hay ningun rol asignado</td> </tr>                        
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@stop
