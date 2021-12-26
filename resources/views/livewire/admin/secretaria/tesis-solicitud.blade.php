<div>
    <div class="mb-3 d-flex justify-content-between">
        <div>
            <span>Fecha de Solicitud: </span> <br>
            <span>{{date("F j, Y, g:i a",strtotime($tesis->created_at))}}</span>
        </div>
        <div>
            <a type="button"type="submit" class="btn btn-success" id="confirmar" wire:click="$emit('enviarDireccion','{{$tesis->id}}')">
                ENVIAR A DIRECCION
            </a>    
            <button type="button" class="btn btn-danger ml-2" data-toggle="modal" data-target="#exampleModal">
                DENEGAR
            </button>
        </div>
    </div>

    <div class="row gx-4">
        {{--Aside--}}
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
        {{-- Tesis --}}
        <div class="col-8 card">
            <div class="card-body">
                <h3 class="my-3 font-weight-bold text-center"> PLAN DE TESIS </h3>
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
                            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModal1">
                                <i class="fas fa-eye"></i> Revisar
                            </button>                       
                            <a href="{{$tesis->vouchers->first()->voucher_url}}" class="btn btn-primary ml-1" download><i class="fas fa-cloud-download-alt"></i> Descargar</a>
                        </div>
                    </div>
                </div>
                <hr class="my-3">
                
                <div class="row">
                    <div class="col-8">                    
                        <span>Formato Unico de Trámite - FUT</span>
                    </div>
                    <div-col-5>
                        <div class="d-flex align-items-center">                        
                            <a id="btnFUT" class="btn btn-secondary"><i class="fas fa-eye"></i> Revisar</a>
                            <a href="{{$tesis->futs->first()->fut_url}}" class="btn btn-primary ml-1" download><i class="fas fa-cloud-download-alt"></i> Descargar</a>
                        </div>
                    </div-col-5>
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
                            <a id="btnTesis" class="btn btn-secondary"><i class="fas fa-eye"></i> Revisar</a>
                            <a href="{{$tesis->tesis_file_tesis}}" class="btn btn-primary ml-1" download><i class="fas fa-cloud-download-alt"></i> Descargar</a>
                        </div>
                    </div>
                </div> 
            </div>
        </div>
    </div>
    
    <!-- Modal Imagenes-->
    <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModal1Label" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModal1Label">Voucher</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img src="{{$tesis->vouchers->first()->voucher_url}}" alt="" class="img-fluid">
            </div>
            
            </div>
        </div>
    </div>
    
    <!-- Modal FUT -->
    <div id="modalFUT" class="modal1">
        <div class="modal-content1" overflow: scroll;>
            <span class="close1" id="closeFUT">&times;</span>
            <embed src="{{$tesis->futs->first()->fut_url}}" id="previewFUT" type="application/pdf" style="height: 92%; width: 100%;">
        </div>
    </div>

    <!-- Modal Plan -->
    <div id="modalTesis" class="modal1">
        <div class="modal-content1" overflow: scroll;>
            <span class="close1" id="closeTesis">&times;</span>
            <embed src="{{$tesis->tesis_file_tesis}}" id="previewTesis" type="application/pdf" style="height: 92%; width: 100%;">
        </div>
    </div>

    <!-- Modal Observaciones-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">MANDAR A CORREGIR</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <label for="">Observarcion: </label>
                <textarea class="form-control" placeholder="Leave a comment here" id="mensajito" style="height: 100px"></textarea>
                <span class="text-muted">* Recuerda especificar todas las correcciones que deberá tener en cuenta el alumno.</span>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" wire:click="$emit('CargarMensaje','{{$tesis->id}}')">Confirmar</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
              </div>            
            </div>
        </div>
    </div>
</div>