@extends('adminlte::page')
@section('title', 'Resumen de Tesis')

@section('content')

<div class="card">
    <div class="card-body">
        <h2 class="my-5 font-weight-bold text-center"> TESIS </h5>
        <div class="row gx-2">
            <!--ASIDE-->
            <div class="col-4">

                <div class="text-center">
                    <img class="h-16 w-16 rounded-circle img-fluid" style="width: 200px" src="{{ Auth::user()->profile_photo_url }}" alt="{{ Auth::user()->name }}" />
                </div><br><br>

                <hr class="my-3 mx-4">

                <div class="text-center">
                    <h5 class="pb-3 font-weight-bold">INFORMACION DEL ALUMNO </h5>

                    <p><span class="font-weight-bold">Código de matricula</span> <br> 
                        {{$tesis->alumno_codigo}}</p>

                    <p><span class="font-weight-bold">Apellidos y Nombres</span> <br> 
                        {{$tesis->apellido.' '.$tesis->nombre}}</p>
                
                </div>        
                <hr class="my-3 mx-4">
                <div class="text-center">
                    <h5 class="pb-3 font-weight-bold">CONTACTO </h5>
                    <p><span class="font-weight-bold"> Email</span> <br>
                    {{$tesis->email}}</p>

                    <p><span class="font-weight-bold">Télefono</span> <br>
                        {{$tesis->telefono}}</p>  
                </div>
            </div>  

            <div class="col-8 px-3">

                <!--tesis-->
                <h5 class="font-weight-bold">INFORME FINAL</h5>
                <div class="d-flex justify-content-center">                    
                    <a href="{{$tesis->file_informe_final}}" class="button" target="_blank"><i class="fas fa-eye"></i> Ver Informe Final</a>
                </div>
                
                <hr class="my-3 mx-3">
                <h5 class="font-weight-bold">JURADOS</h5>
                @foreach ($jurados as $jurado)
                <div class="row">
                    <div class="col">
                        Docente: <p class="form-control"> {{$jurado->nombre}}</p>
                    </div>
                    <div class="col">Nota:  <p class="form-control">{{$jurado->nota}}</p>
                    </div> 
                </div>
                @endforeach
                <hr class="my-3 mx-3">
                <h5 class="font-weight-bold">Titulo</h5>
                <p class="form-control"> {{$tesis->titulo}} </p> 

                <span class="font-weight-bold">Fecha de Incio:</span>
                <p class="form-control"> {{$tesis->fecha_inicio}} </p> 
                <span class="font-weight-bold">Fecha de Fin:</span>
                <p class="form-control"> {{$tesis->fecha_fin}} </p> 

                <div class="d-flex justify-content-center">                    
                    <a href="{{$tesis->file_tesis}}" class="button"target="_blank"><i class="fas fa-eye"></i> Carpeta de Tesis</a>
                </div>

                

                <hr class="my-3 mx-3">
                
                <!--VOUCHER-->
                <h5 class="font-weight-bold pb-3"> Voucher </h5>

                <span class="font-weight-bold">Numero de Operacion: </span>
                <p class="form-control"> {{$tesis->nro}} </p>

                <div class="d-flex justify-content-center">                    
                    <a href="{{$tesis->file_voucher}}" class="button" target="_blank"><i class="fas fa-eye"></i> Voucher</a>
                </div>

            </div>
        </div>
    </div>
</div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    
@stop