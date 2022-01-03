<div>
    <div class="row gx-4">
        {{-- SideBar --}}
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
        {{-- Fin SideBar --}}

        <div class="col-8 card">
            <div class="card-body">
                <h3 class="my-3 font-weight-bold text-center"> INFORME FINAL </h3>
                {{-- Botones de Envio o Denegacion--}}
                <div class="d-flex text-center justify-content-end">
                    <a type="button"type="submit" class="btn btn-success mx-2" id="confirmar" wire:click="$emit('enviarDireccionIF','{{$practica->id}}')">
                        ENVIAR
                    </a>
                    <button type="button" class="btn btn-danger ml-2" data-toggle="modal" data-target="#exampleModal">
                        DENEGAR
                    </button>
                </div>
                {{-- Fin de Botones de Envio o Denegacion--}}
                <h6 class="font-weight-bold"> Voucher </h6>
                <div class="row">
                    <div class="col-8">
                        <span>Numero de Operacion: </span>
                        <p class="form-control"> {{$practica->vouchers->last()->voucher_nro}} </p>
                    </div>
                    <div class="col-4">
                        <span>Comprobante:</span>
                        <div class="d-flex align-items-center">
                            <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#exampleModal1">
                                <i class="fas fa-eye"></i> Revisar
                            </button> 
                            <a href="{{$practica->vouchers->last()->voucher_url}}" class="btn btn-primary ml-1" download><i class="fas fa-cloud-download-alt"></i> Descargar</a>
                        </div>
                    </div>
                </div>
                <hr class="my-3">
                <h6 class="font-weight-bold">Practica</h6>
                <div class="row">
                    <div class="col-8">
                        <span>Formato Unico de Trámite - FUT</span>
                    </div>
                    <div class="col-4">
                        <div class="d-flex align-items-center">
                            <a id="btnFUT" class="btn btn-secondary"><i class="fas fa-eye"></i> Revisar</a>
                            <a href="{{$practica->futs->last()->fut_url}}" class="btn btn-primary ml-1" download><i class="fas fa-cloud-download-alt"></i> Descargar</a>
                        </div>
                    </div>
                </div>

                <hr class="my-3">
                <h6 class="font-weight-bold">Informe Final</h6>
                <div class="row">
                    <div class="col-8">
                        <span>Informe Final</span>
                    </div>
                    <div class="col-4">
                        <div class="d-flex align-items-center">
                            <a id="btnPractica" class="btn btn-secondary"><i class="fas fa-eye"></i> Revisar</a>
                            <a href="{{$practica->practica_file_informe_final_url}}" class="btn btn-primary ml-1" download><i class="fas fa-cloud-download-alt"></i> Descargar</a>
                        </div>
                    </div>
                </div>

                <hr class="my-3">
                <h6 class="font-weight-bold">Certificado de Practicas</h6>
                <div class="row">
                    <div class="col-8">
                        <span>Certificado de Practicas</span>
                    </div>
                    <div class="col-4">
                        <div class="d-flex align-items-center">
                            <a id="btnCertificado" class="btn btn-secondary"><i class="fas fa-eye"></i> Revisar</a>
                            <a href="{{$practica->practica_certificado_url}}" class="btn btn-primary ml-1" download><i class="fas fa-cloud-download-alt"></i> Descargar</a>
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
                <img src="{{$practica->vouchers->last()->voucher_url}}" alt="" class="img-fluid">
            </div>
            
            </div>
        </div>
    </div>
    <!-- Modal FUT -->
    <div id="modalFUT" class="modal1">
        <div class="modal-content1" overflow: scroll;>
            <span class="close1" id="closeFUT">&times;</span>
            <embed src="{{$practica->futs->last()->fut_url}}" id="previewFUT" type="application/pdf" style="height: 92%; width: 100%;">
        </div>
    </div>

    <!-- Modal Practica -->
    <div id="modalPractica" class="modal1">
        <div class="modal-content1" overflow: scroll;>
            <span class="close1" id="closePractica">&times;</span>
            <embed src="{{$practica->practica_file_informe_final_url}}" id="previewPractica" type="application/pdf" style="height: 92%; width: 100%;">
        </div>
    </div>

    <!-- Modal Certificado -->
    <div id="modalCertificado" class="modal1">
        <div class="modal-content1" overflow: scroll;>
            <span class="close1" id="closeCertificado">&times;</span>
            <embed src="{{$practica->practica_certificado_url}}" id="previewPractica" type="application/pdf" style="height: 92%; width: 100%;">
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
                <button type="button" class="btn btn-primary" wire:click="$emit('CargarMensajeIF','{{$practica->id}}')">Confirmar</button>
                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
              </div>            
            </div>
        </div>
    </div>
    <script>
                
        let modalCert = document.querySelector("#modalCertificado");
        let spanCert = document.querySelector("#closeCertificado");             
        let botonCert = document.querySelector('#btnCertificado');
    
        spanCert.onclick = function() {
            modalCert.style.display = "none";
        }
        window.onclick = ()=> {
            if (event.target == modalCert) {
                modalCert.style.display = "none";
            }
        }
    
        botonCert.onclick = ()=>{                    
           modalCert.style.display = "block";
        }        
      </script>
</div>