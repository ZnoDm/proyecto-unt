@extends('adminlte::page')

@section('title', 'Docentes')

@section('content_header')
    <h1>Bandeja de Entrada</h1>
@stop

@section('content')
    <h4>JURADO DE TESIS</h4>
    @livewire('admin.docente.tesis-observaciones', ['tesis' => $tesis_asignadas,'docente'=>$docente])
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop
@section('js')
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
@endsection
