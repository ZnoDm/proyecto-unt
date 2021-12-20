<div>
    <div class="row">
        <div class="col-12">
            <a 
            wire:model="tipo"
            wire:click = "$set('tipo','tesis')"
            class="btn btn-primary">TESIS</a>
            <a 
            wire:model="tipo"
            wire:click = "$set('tipo','practica')"
            class="btn btn-primary">PRACTICA</a>
            <form class="d-flex my-4">
                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-success" type="submit">Search</button>
            </form>
        </div>
    </div>
    <div class="row">
        <div class="col-12 card">
          <div class="card-body">
            <table class="table">
              <thead>
                <tr>
                    <th>Fecha</th>
                    <th>COD Alumno</th>
                    <th>Alumno</th>
                    <th>COD Docente</th>
                    <th>Docente</th>
                    <th>Detalle</th>
                    <th>Acciones</th>
                </tr>
              </thead>
              <tbody>
                  @if ($tipo=='practica')
                    @forelse($practicas as $solicitud)
                        <tr wire:key="practica-solicitud-{{$solicitud->id}}">
                            <td>{{date('Y-m-d',strtotime($solicitud->created_at))}}</td>
                            <td>{{$solicitud->alumno->id}}</td>  
                            <td>{{$solicitud->alumno->alumno_apellido.' '.$solicitud->alumno->alumno_nombre}}</td>                         
                            <td>{{$solicitud->docente->id}}</td>
                            <td>{{$solicitud->docente->docente_apellido.' '.$solicitud->docente->docente_nombre}}</td> 
                            <td>
                                @if ($solicitud->practica_status == 2)
                                    SOLICITUD DE PRACTICA
                                @else
                                    INFORME FINAL
                                @endif
                            </td>
                            <td>
                                @php
                                    if($solicitud->practica_status == 2)
                                        $url= $solicitud->practica_file_practica_url;
                                    else
                                        $url= $solicitud->practica_file_informe_final_url;
                                @endphp
                                <a id="btnPractica" class="btn btn-secondary" wire:click="$emit('CargarModal','{{$url}}')"><i class="fas fa-eye"></i> </a>

                                <button  wire:click="$emit('AprobarPracticaDireccion','{{$solicitud->id}}','{{$solicitud->practica_status}}')"
                                        class="btn btn-success ml-1" type="button">
                                    <i class="fas fa-thumbs-up"></i>
                                </button>

                                <button type="button" class="btn btn-danger ml-1" data-toggle="modal" data-target="#exampleModal" onclick="recogerPracticaId('{{$solicitud->id}}','{{$solicitud->practica_status}}')">
                                    <i class="fas fa-thumbs-down"></i>
                                </button>
                                
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-center" colspan="7">No tiene practicas pendientes</td>
                        </tr>
                    @endforelse
                    <!-- Modal Observaciones-->
                    <div class="modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                                <button type="button" class="btn btn-primary" wire:click="$emit('CargarMensaje')">Confirmar</button>
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                            </div>            
                            </div>
                        </div>
                    </div>
                    <!-- Modal Practica -->
                    <div id="modalPractica" class="modal1">
                        <div class="modal-content1" overflow: scroll;>
                            <span class="close1" id="closePractica">&times;</span>
                            <embed id="preview" type="application/pdf" style="height: 92%; width: 100%;">
                        </div>
                    </div>   
                  @else
                    @forelse($tesis as $solicitud)
                        <tr>
                            <th scope="row">{{$solicitud->id}} </th>
                            <td>{{date('Y-m-d',strtotime($solicitud->created_at))}}</td>
                            <td>{{$solicitud->alumno->id}}</td>
                            <td>{{$solicitud->alumno->alumno_nombre}}</td>
                            <td>
                                @if ($solicitud->tesis_status == 2)
                                    SOLICITUD DE TESIS
                                @else
                                    INFORME FINAL
                                @endif
                            </td>
                            <td>
                                <button class="btn btn-secondary" >
                                    <i class="fas fa-eye"></i>
                                </button>
                            </td>
                            <td>
                               @if ($solicitud->tesis_status ==5)
                                    <button class="btn btn-success" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <i class="fas fa-thumbs-up"></i>
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                            <span type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"><i class="fas fa-times"></i></span>
                                            </div>
                                            <div class="modal-body">
                                            <h5 class="font-weight-bold text-center">ASIGNAR JURADO</h5>
                                            <div class="row px-5">
                                                <select name="docente_id" id="docente_id" class="form-control w-100" aria-label=".form-select-lg example" onchange="agregar();" >
                                                        <option value="">SELECCIONA UN DOCENTE</option>
                                                        @foreach($docentes as $docente)
                                                            <option value="{{$docente->id}}_{{$docente->docente_nombre}}">{{$docente->docente_nombre}}</option>
                                                        @endforeach
                                                </select>
                                                <br> <br>
                                                <table class="table" id="detalle">
                                                    <tr>
                                                        <th scope="col">CODIGO</th>
                                                        <th scope="col">DOCENTE</th>
                                                        <th scope="col">ACCION</th>
                                                    </tr>
                                                </table>
    
                                            </div>
                                            </div>
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button wire:click="$emit('AprobarTesisDireccionIF','{{$solicitud->id}}','{{$solicitud->tesis_status}}')" class="btn btn-success" type="button"
                                            data-bs-toggle="modal" data-bs-target="#exampleModal">Save changes</button>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                               @else
                                    <button wire:click="$emit('AprobarTesisDireccion','{{$solicitud->id}}','{{$solicitud->tesis_status}}')" class="btn btn-success" type="button"
                                    data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <i class="fas fa-thumbs-up"></i>
                                    </button>
                               @endif
                                <button class="btn btn-danger" type="button"><i class="fas fa-thumbs-down" ></i></button>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-center" colspan="7">No tiene tesis pendientes</td>
                        </tr>
                    @endforelse
                  @endif
              </tbody>
            </table>
          </div>
      </div> 
    </div>
    
</div>

