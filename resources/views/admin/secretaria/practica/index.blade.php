@extends('adminlte::page')

@section('title', 'Practicas Pendientes')
@section('content_header')
    <h3 class="d-flex">{{strtoupper('practicas Pendientes de Aprobacion')}}</h3>
@stop
@section('content')
    <hr class="mt-3">
    @livewire('admin.secretaria.bandeja-practica')
@stop
