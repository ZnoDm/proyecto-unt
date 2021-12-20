<div>
    <div class="row gx-4">
        <div class="col-4">
            <div class="d-flex bg-light rounded">
                <div class="card-body d-flex flex-row">
                    <img class="rounded-circle img-fluid" style="width: 75px; height: 75px;" src="{{$alumno->user->profile_photo_url}}" alt="{{ $alumno->user->name }}" />
                    <h4 class="ml-4 font-weight-bold d-flex align-items-center">{{strtoupper($alumno->alumno_apellido.' '.$alumno->alumno_nombre)}}</h4>
                </div>
            </div>
            <div class="card-body">
                <span>Direccion de Correo</span>
                <p class="text-info">{{$alumno->alumno_email}}</p>
                <span>Código UNT</span>
                <p class="text-info">{{$alumno->id}}</p> 
                <span>Fecha de Nacimiento</span>
                <p class="text-info">{{$alumno->alumno_fechanacimiento}}</p>
                <span>Telefono</span>
                <p class="text-info">{{$alumno->alumno_telefono}}</p>  
                <span>País</span>
                <p class="text-info">Perú</p>
                <span>Ciudad</span>
                <p class="text-info">Trujillo</p>           
                <span>Escuela</span>
                <p class="text-info">INGENIERIA DE SISTEMAS</p>  
                <span>Sede</span>
                <p class="text-info">TRUJILLO</p>  
                <span>Facultad</span>
                <p class="text-info">INGENIERIA</p>          
            </div>
        </div>
        <div class="col-8 card">
            <div class="card-body">
                <h3 class="my-3 font-weight-bold text-center"> PLAN DE TESIS </h3>
                <!--tesis-->
                @if ($tesis->status ==5)
                    <h5 class="font-weight-bold">INFORME FINAL</h5>
                    <div class="d-flex justify-content-center">                    
                        <a href="{{$tesis->file_informe_final}}" class="button" download><i class="fa fa-download"></i> Revisar informe Final</a>
                    </div>                
                    <hr class="my-3 mx-3">
                @endif
                
                <!--VOUCHER-->
                <h6 class="font-weight-bold"> Voucher </h6> 
                <div class="row">               
                    <div class="col-8">
                        <span>Numero de Operacion: </span>
                        <p class="form-control"> {{$tesis->vouchers->first()->voucher_nro}} </p>
                    </div>
                    <div class="col-4">                
                        <span>Comprobante:</span>
                        <div class="d-flex align-items-center">                        
                            <a href="{{$tesis->file_tesis}}" class="btn btn-secondary" download><i class="fas fa-eye"></i> Revisar</a>
                            <a href="{{$tesis->file_voucher}}" class="btn btn-primary ml-3" download><i class="fas fa-cloud-download-alt"></i> Descargar</a>
                        </div>
                    </div>
                </div>
                <hr class="my-3">            
                <h6 class="font-weight-bold">Tesis</h6>
                <div class="row">
                    <div class="col">
                        <span >Titulo: </span>              
                        <p class="form-control"> {{$tesis->tesis_titulo}} </p>
                    </div>     
                </div>
                <div class="row">
                    <div class="col-8">                    
                        <span>Formato Unico de Trámite - FUT</span>
                    </div>
                    <div-col-5>
                        <div class="d-flex align-items-center">                        
                            <a href="{{$tesis->file_tesis}}" class="btn btn-secondary" download><i class="fas fa-eye"></i> Revisar</a>
                            <a href="{{$tesis->file_voucher}}" class="btn btn-primary ml-3" download><i class="fas fa-cloud-download-alt"></i> Descargar</a>
                        </div>
                    </div-col-5>
                </div>
    
                <div class="row">
                    <div class="col">
                        <span >Asesor: </span>              
                        <p class="form-control"> {{$tesis->docente->docente_nombre}} </p>
                    </div> 
                </div> 
    
                <div class="row">
                    <div class="col-4">
                        <span>Fecha de Incio:</span>
                        <p class="form-control"> {{$tesis->tesis_fechainicio}} </p> 
                    </div>
                    <div class="col-4">
                        <span>Fecha de Fin:</span>
                        <p class="form-control"> {{$tesis->tesis_fechafin}} </p>
                    </div>
                    <div class="col-4"> 
                        <span>Plan de Tesis:</span>
                        <div class="d-flex align-items-center">                        
                            <a href="{{$tesis->file_tesis}}" class="btn btn-secondary" download><i class="fas fa-eye"></i> Revisar</a>
                            <a href="{{$tesis->file_voucher}}" class="btn btn-primary ml-3" download><i class="fas fa-cloud-download-alt"></i> Descargar</a>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>
    
    <div class="d-flex text-center justify-content-center">
        @php
            //SI ES ESTADO ES 5 (ENVIO INFORME FINAL)
            if($tesis->status == 5 ) {$estado= 5;} else {$estado= 3;}
        @endphp
            {{-- {{route('admin.tesis.aprobar',['id'=>$tesis->id,'alumno' =>$tesis->alumno_codigo,'estado' =>$estado])}} --}}
        <a type="button"type="submit" class="btn btn-success mx-2" id="confirmar" wire:click="$emit('enviarDireccion','{{$tesis->id}}')">
            ENVIAR
        </a>
    
        <button type="button" class="btn btn-danger mx-2" data-toggle="modal" data-target="#exampleModal">
                DENEGAR
        </button>
    </div>
</div>