<div>
    @foreach ($observaciones as $observacion)

    <div class="card bg-secondary">
        
        <div class="card-header text-center">
            {{$observacion->created_at}}
          </div>
        <div class="card-body">
            <div class="d-flex">
                <div class="mr-auto">                    
                    <h5 class="card-title">OBSERVACION:</h5>
                    <p class="card-text">{{$observacion->observacion}}</p>
                    
                    @if ($observacion->respuesta)
                        <h5 class="card-title">RESPUESTA:</h5>
                        <p class="card-text">{{$observacion->respuesta}}</p>
                    @endif
                </div>
                
                <div class="text-right">
                    @if (!$observacion->respuesta)
                            ESTADO: ENVIADO
                    @else
                            ESTADO: RESPONDIDO
                    @endif                    
                </div>
            </div>
            

           
            @if ($observacion->file_respuesta)
                <div class="text-right">
                    <a id="btnPractica" class="btn btn-info" wire:click="$emit('CargarModal','{{$observacion->file_respuesta}}','TESIS')">Ver informe Actualizado</a>
                </div>
            @endif
        </div>
    </div>
    @endforeach
    <div class="pt-3">
        <hr class="my-3">
        <form wire:submit.prevent="enviar">
            <h5 class="text-center">AGREGA UNA NUEVA OBSERVACION</h5>
            <textarea wire:model="mensaje" class="form-control" placeholder="Ingrese un comentario aqui." id="floatingTextarea2" style="height: 60px"></textarea>
            @error('mensaje')
                <p class="text-danger">{{$message}}</p>
            @enderror
            <div class="text-right pt-3">            
                <button type="submit" class="btn btn-success"><i class="fas fa-paper-plane"></i> SEND</button>
            </div>
        </form> 
    </div> 
</div>
