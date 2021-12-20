@extends('adminlte::page')

@section('title', 'Empresas')

@section('content_header')
    <h1>Pendientes de Aprobación</h1>
    <hr class="mt-3">
@stop

@section('content')

<div class="card">
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>NRO OPERACION</th>
                    <th>RECIBO</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($vouchers as $voucher)
                    <tr>
                        <td>{{$voucher->nro}}</td>
                        <td>{{$voucher->file_voucher}}</td>
                        
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

