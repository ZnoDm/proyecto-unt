<div>
    <h3 class="py-3 mb-2">SOLICITUDES RECIENTES {{($tipo_selected==1)?' - PRACTICAS':' - TESIS'}}</h3>
    <h6>FILTROS</h6>
    <div class="row my-4 gap-4">
        <div class="col-2">
            <label for="porfecha" style="font-weight: 500!important" class="d-block"> Fecha </label>
            <select wire:model="fecha_selected" id="porfecha" name="porfecha" class="form-control form-select w-full" aria-label="Default select example">
                <option value="1" >Todos</option>
                <option value="2" >Hace un semana</option>
                <option value="3" >Hace un mes</option>
                <option value="3" >Hace 3 meses</option>
                <option value="3" >Hace un año</option>
            </select>
            <small id="emailHelp" class="form-text text-muted">Filtro fecha.</small>
        </div>
        <div class="col-2">
            <label for="pordetalle" style="font-weight: 500!important" class="d-block"> Detalle </label>
            <select wire:model="detalle_selected" id="pordetalle" name="pordetalle" class="form-control form-select w-full" aria-label="Default select example">
                <option value="1" >Todos</option>
                <option value="2" >Solicitud</option>
                <option value="3" >Informe Final</option>
            </select>
            <small id="emailHelp" class="form-text text-muted">Filtro detalle.</small>
        </div>

        <div class="col-2">
            <label for="portipo" style="font-weight: 500!important" class="d-block"> Tipo</label>
            <select wire:model="tipo_selected" id="portipo" name="portipo" class="form-control form-select w-full" aria-label="Default select example">
                <option value="0" >Todos</option>
                <option value="1" >Practicas</option>
                <option value="2" >Tesis</option>
            </select>
            <small id="emailHelp" class="form-text text-muted">Filtro Tipo.</small>
        </div>
        <div class="col-3">
            <label for="poralumno" style="font-weight: 500!important" class="d-block">Alumno</label>
            <input wire:model="alumno_search" type="search" placeholder="Busqueda por Alumno" id="poralumno" name="poralumno" class="w-full form-control" aria-label="search" value="">
            <small id="emailHelp" class="form-text text-muted">Filtro alumno.</small>
        </div>
        <div class="col-3">
            <label for="pordocente" style="font-weight: 500!important" class="d-block">Docente</label>
            <input wire:model="docente_search" type="search" placeholder="Busqueda por Docente" id="pordocente" name="pordocente" class="w-full form-control" aria-label="search" value="">
            <small id="emailHelp" class="form-text text-muted">Filtro docente.</small>
            
        </div>
        <div class="col-12">
                {{--ELIMINAR FILTROS--}}
            <a class="btn btn-danger mt-4" href="{{route('admin.direccion.index')}}" role="button">ELIMINAR FILTROS</a>
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
                    <th width="200px" class="text-center">Acciones</th>
                </tr>
              </thead>
              <tbody>
                    @if ($tipo_selected==0)
                        @forelse($tesis as $solicitud)
                            <tr wire:key="tesis-solicitud-{{$solicitud->id}}">
                                <td>{{date('Y-m-d',strtotime($solicitud->created_at))}}</td>
                                <td>{{$solicitud->alumno->id}}</td>  
                                <td>{{$solicitud->alumno->alumno_apellido.' '.$solicitud->alumno->alumno_nombre}}</td>                         
                                <td>{{$solicitud->docente->id}}</td>
                                <td>{{$solicitud->docente->docente_apellido.' '.$solicitud->docente->docente_nombre}}</td> 
                                <td>
                                    @if ($solicitud->tesis_status == 2)
                                        SOLICITUD DE TESIS
                                    @else
                                        INFORME FINAL TESIS
                                    @endif
                                </td>
                                <td class="text-center">
                                    @php
                                        if($solicitud->tesis_status == 2)
                                            $url= $solicitud->tesis_file_tesis;
                                        else
                                            $url= $solicitud->tesis_file_informefinal;
                                    @endphp
                                    <a id="btnPractica" class="btn btn-secondary" wire:click="$emit('CargarModal','{{$url}}','TESIS')"><i class="fas fa-eye"></i> </a>
                                    @if ($solicitud->tesis_status != 5)
                                        <button  wire:click="$emit('AprobarTesisDireccion','{{$solicitud->id}}','{{$solicitud->tesis_status}}')" onclick="recogerTesisId('{{$solicitud->id}}','{{$solicitud->tesis_status}}')"
                                            class="btn btn-success ml-1" type="button">
                                        <i class="fas fa-thumbs-up"></i>
                                        </button>
                                    @else
                                        <button data-toggle="modal" data-target="#exampleModal1" onclick="recogerTesisId('{{$solicitud->id}}','{{$solicitud->tesis_status}}')"
                                            class="btn btn-success ml-1" type="button">
                                        <i class="fas fa-thumbs-up"></i>
                                        </button>
                                    @endif
                                    <button type="button" class="btn btn-danger ml-1" data-toggle="modal" data-target="#exampleModal" onclick="recogerTesisId('{{$solicitud->id}}','{{$solicitud->tesis_status}}')">
                                        <i class="fas fa-thumbs-down"></i>
                                    </button>
                                </td>
                            </tr>
                        @empty
                        @endforelse
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
                                        INFORME FINAL PRACTICA
                                    @endif
                                </td>
                                <td class="text-center">
                                    @php
                                        if($solicitud->practica_status == 2)
                                            $url= $solicitud->practica_file_practica_url;
                                        else
                                            $url= $solicitud->practica_file_informe_final_url;
                                    @endphp
                                    <a id="btnPractica" class="btn btn-secondary" wire:click="$emit('CargarModal','{{$url}}','PRACTICA')"><i class="fas fa-eye"></i> </a>
                                    {{-- Aprobar Practica --}}
                                    <button  wire:click="$emit('AprobarPracticaDireccion','{{$solicitud->id}}','{{$solicitud->practica_status}}')"
                                            class="btn btn-success ml-1" type="button">
                                        <i class="fas fa-thumbs-up"></i>
                                    </button>
                                    {{-- Denegar Practica --}}
                                    <button type="button" class="btn btn-danger ml-1" data-toggle="modal" data-target="#exampleModal" onclick="recogerPracticaId('{{$solicitud->id}}','{{$solicitud->practica_status}}')">
                                        <i class="fas fa-thumbs-down"></i>
                                    </button>
                                    
                                </td>
                            </tr>
                        @empty
                        @endforelse

                        @if($tesis->count()==0 and $practicas->count()==0)
                            <tr>
                                <td class="text-center" colspan="7">No tiene tesis ni practicas pendientes</td>
                            </tr>
                        @endempty
                    @else
                        @if ($tipo_selected==1)
                        {{-- practicas --}}
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
                                            INFORME FINAL PRACTICA
                                        @endif
                                    </td>
                                    <td class="text-center"> 
                                        @php
                                            if($solicitud->practica_status == 2)
                                                $url= $solicitud->practica_file_practica_url;
                                            else
                                                $url= $solicitud->practica_file_informe_final_url;
                                        @endphp
                                        <a id="btnPractica" class="btn btn-secondary" wire:click="$emit('CargarModal','{{$url}}','PRACTICA')"><i class="fas fa-eye"></i> </a>
                                        {{-- Aprobar Practica --}}
                                        <button  wire:click="$emit('AprobarPracticaDireccion','{{$solicitud->id}}','{{$solicitud->practica_status}}')"
                                                class="btn btn-success ml-1" type="button">
                                            <i class="fas fa-thumbs-up"></i>
                                        </button>
                                        {{-- Denegar Practica --}}
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
                        @else
                        {{-- tesis --}}
                            @forelse($tesis as $solicitud)
                                <tr wire:key="tesis-solicitud-{{$solicitud->id}}">
                                    <td>{{date('Y-m-d',strtotime($solicitud->created_at))}}</td>
                                    <td>{{$solicitud->alumno->id}}</td>  
                                    <td>{{$solicitud->alumno->alumno_apellido.' '.$solicitud->alumno->alumno_nombre}}</td>                         
                                    <td>{{$solicitud->docente->id}}</td>
                                    <td>{{$solicitud->docente->docente_apellido.' '.$solicitud->docente->docente_nombre}}</td> 
                                    <td>
                                        @if ($solicitud->tesis_status == 2)
                                            SOLICITUD DE TESIS
                                        @else
                                            INFORME FINAL TESIS
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        @php
                                            if($solicitud->tesis_status == 2)
                                                $url= $solicitud->tesis_file_tesis;
                                            else
                                                $url= $solicitud->tesis_file_informefinal;
                                        @endphp
                                        <a id="btnPractica" class="btn btn-secondary" wire:click="$emit('CargarModal','{{$url}}','TESIS')"><i class="fas fa-eye"></i> </a>
                                        @if ($solicitud->tesis_status != 5)
                                            <button  wire:click="$emit('AprobarTesisDireccion','{{$solicitud->id}}','{{$solicitud->tesis_status}}')"
                                                onclick="recogerTesisId('{{$solicitud->id}}','{{$solicitud->tesis_status}}')"
                                                class="btn btn-success ml-1" type="button">
                                            <i class="fas fa-thumbs-up"></i>
                                            </button>
                                        @else
                                            <button data-toggle="modal" data-target="#exampleModal1" onclick="recogerTesisId('{{$solicitud->id}}','{{$solicitud->tesis_status}}')"
                                                class="btn btn-success ml-1" type="button">
                                            <i class="fas fa-thumbs-up"></i>
                                            </button>
                                        @endif
                                        <button type="button" class="btn btn-danger ml-1" data-toggle="modal" data-target="#exampleModal" onclick="recogerTesisId('{{$solicitud->id}}','{{$solicitud->tesis_status}}')">
                                            <i class="fas fa-thumbs-down"></i>
                                        </button>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center" colspan="7">No tiene tesis pendientes</td>
                                </tr>
                            @endforelse
                        @endif
                    @endif
              </tbody>
            </table>
          </div>
      </div> 
    </div>        
    <!-- Modal Jurado-->
    <div class="modal fade bd-example-modal-lg" id="exampleModal1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog  modal-lg">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">ASIGNA JURADO PARA APROBAR LA TESIS</h5>           
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </div>
            <div class="modal-body">
                <h5 class="font-weight-bold text-center">JURADO</h5>
                <div class="row px-5">
                    <div class="pb-4">
                        <label for="">Docente: </label>
                        <select name="docente_id" id="docente_id" class="form-control w-100" aria-label=".form-select-lg example" onchange="agregar();" >
                                <option value="" disabled selected>SELECCIONA UN DOCENTE</option>
                                @foreach($docentes as $docente)
                                    <option value="{{$docente->id}}_{{$docente->docente_nombre}}">{{$docente->docente_nombre}}</option>
                                @endforeach
                        </select>
                    </div>
                    <table class="table" id="detalle">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col" width="20px">CODIGO</th>
                            <th scope="col"width="300px" >DOCENTE</th>                            
                            <th scope="col"width="200px" >PUESTO</th>
                            <th scope="col"width="20px" class="text-center">ACCION</th>
                        </tr>
                        </thead>
                    </table>
                </div>
                @error('error') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-info" data-dismiss="modal">Cancelar</button>
                <button wire:click="$emit('AprobarTesisDireccionIF')" class="btn btn-success" type="button"
            data-bs-toggle="modal" data-bs-target="#exampleModal1" id="submitIF" disabled>Aprobar</button>
            </div>
        </div>
    </div>
    </div>
    <!-- Modal Practica -->
    <div id="modalPreview" class="modal1">
        <div class="modal-content1" overflow: scroll;>
            <span class="close1" id="closePreview">&times;</span>
            <embed id="preview" type="application/pdf" style="height: 92%; width: 100%;">
        </div>
    </div>
    
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
</div>

