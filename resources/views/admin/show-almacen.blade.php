@extends('adminlte::page')
@section('title', 'Practica Finalizada')

@section('content')

<div class="card">
    <div class="card-body">
        <h2 class="my-5 font-weight-bold text-center"> PLAN DE PRACTICA </h5>
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
                        {{$practica->alumno_codigo}}</p>

                    <p><span class="font-weight-bold">Apellidos y Nombres</span> <br> 
                        {{$practica->apellido.' '.$practica->nombre}}</p>
                
                </div>        
                <hr class="my-3 mx-4">
                <div class="text-center">
                    <h5 class="pb-3 font-weight-bold">CONTACTO </h5>
                    <p><span class="font-weight-bold"> Email</span> <br>
                    {{$practica->email}}</p>

                    <p><span class="font-weight-bold">Télefono</span> <br>
                        {{$practica->telefono}}</p>  
                </div>
            </div>  

            <div class="col-8 px-3">

                <!--PRACTICA-->
                <h5 class="font-weight-bold">INFORME FINAL</h5>
                <div class="d-flex justify-content-center">                    
                    <a href="{{$practica->file_informe_final}}" class="button" target="_blank"><i class="fas fa-eye"></i> Ver Informe Final</a>
                </div>
                
                <hr class="my-3 mx-3">
                <h5 class="font-weight-bold">Asesor</h5>
                <p class="form-control"> {{$practica->docente}} </p> 
                <hr class="my-3 mx-3">

                <h5 class="font-weight-bold">Asunto</h5>
                {!!$practica->descripcion!!}

                <span class="font-weight-bold">Fecha de Incio:</span>
                <p class="form-control"> {{$practica->fecha_inicio}} </p> 
                <span class="font-weight-bold">Fecha de Fin:</span>
                <p class="form-control"> {{$practica->fecha_fin}} </p>

                <div class="d-flex justify-content-center">                    
                    <a href="{{$practica->file_practica}}" class="button" target="_blank"><i class="fas fa-eye"></i> Plan de Practica</a>
                </div>

                <hr class="my-3 mx-3">

                <!--VOUCHER-->
                <h5 class="font-weight-bold pb-3"> Voucher </h5>

                <span class="font-weight-bold">Numero de Operacion: </span>
                <p class="form-control"> {{$practica->nro}} </p>

                <div class="d-flex justify-content-center">                    
                    <a href="{{$practica->file_voucher}}" class="button" target="_blank"><i class="fas fa-eye"></i> Voucher</a>
                </div>

                <hr class="my-3 mx-3">


                <!--PRACTICA-->
                <h5 class="font-weight-bold pb-3"> Empresa</h5>
                <span class="font-weight-bold">Numero de Operacion: </span>
                <p class="form-control">{{$practica->ruc}}</p>

                <span class="font-weight-bold">Razon Social: </span>
                <p class="form-control">{{$practica->razonsocial}}</p>

                <span class="font-weight-bold">Representatne Legal: </span>
                <p class="form-control">{{$practica->representante}}</p>

                <span class="font-weight-bold">Supervisor del Academico: </span>
                <p class="form-control">{{$practica->supervisor}}</p>

                <span class="font-weight-bold">Telefono del Supervisor: </span>
                <p class="form-control">{{$practica->e_telefono}}</p>
            </div>
        </div>
    </div>
</div>



@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    
@stop

