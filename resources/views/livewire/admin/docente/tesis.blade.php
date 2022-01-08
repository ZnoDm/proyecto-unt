<div>
    
    <div>
        
        @forelse($tesis as $tes)
            <article class="card shadow-sm p-4 mb-3 bg-body rounded" x-data="{open:false}">
                <h5>JURADO - {{$tes->puesto}} - DE:</h5>
                <div class="d-flex">
                    <div class="mr-auto">
                        <span>TITULO : {{$tes->tesis_titulo}}</span> <br>
                        <span>ALUMNO : {{$tes->alumno_apellido.' '.$tes->alumno_nombre}}</span> <br>                    
                    </div>
                    <div>
                        @if ($tes->estado_jurado ==1)
                            <a class="btn btn-success" wire:click="$emit('DocenteAcepta','{{$tes->jurado_id}}')"><i class="fas fa-thumbs-up"></i></a>
                            <a id="btnPractica" class="btn btn-secondary" wire:click="$emit('CargarModal','{{$tes->tesis_file_informefinal;}}','TESIS')"><i class="fas fa-eye"></i> </a>
                        @endif
                    </div>
                </div>
                
                @if ($tes->estado_jurado ==1)
                    
                    <div class="text-center">  
                        <a x-on:click="open = !open" class="btn" :class="[open? 'btn-danger' : 'btn-primary']" x-text="[open? 'CANCELAR' : 'OBSERVACIONES']"></a>
                    </div>
                    <div class="px-6 py-2" x-show="open">
                        @livewire('admin.docente.tesis-observacion', ['jurado'=>$tes->jurado_id], key($tes->jurado_id))
                    </div>
                @else
                    <div class="text-right">
                        ESTADO: TESIS ACEPTADA
                    </div>
                @endif
            </article>
        @empty
            <div class="text-center">
                NO SE LE HA ASIGNADO COMO JURADO
            </div>
        @endforelse    
    </div> 
    
    <div id="modalPreview" class="modal1">
        <div class="modal-content1" overflow: scroll;>
            <span class="close1" id="closePreview">&times;</span>
            <embed id="preview" type="application/pdf" style="height: 92%; width: 100%;">
        </div>
    </div>   
</div>
