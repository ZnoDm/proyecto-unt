@extends('adminlte::page')

@section('title', 'Jurados')

@section('content_header')
    <h1>Bandeja de Entrada</h1>
@stop

@section('content')
    <h4>ALMACEN DE JURADOS</h4>
    @livewire('admin.almacen.admin-jurado')
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
@endsection