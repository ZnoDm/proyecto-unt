@extends('adminlte::page')

@section('title', 'Alumnos')

@section('content_header')
    <h1>Almacen de Alumnos</h1>
@stop

@section('content')
    @livewire('admin.almacen.admin-alumno')
@stop

