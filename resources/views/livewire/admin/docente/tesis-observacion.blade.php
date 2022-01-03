<div>
    @foreach ($observaciones as $observacion)

    <div class="card">
        
        <div class="card-header text-muted text-center">
            2 days ago
          </div>
        <div class="card-body">
            @if (!$observacion->respuesta)
                <div class="text-right">
                    ESTADO: ENVIADO
                </div>
            @else
                <div class="text-right">
                    ESTADO: RESPONDIDO
                </div>
            @endif
                <h5 class="card-title">Observacion:</h5>
                <p class="card-text">{{$observacion->observacion}}</p>
            @if ($observacion->respuesta)
                <h5 class="card-title">Respuesta:</h5>
                <p class="card-text">{{$observacion->respuesta}}</p>
            @endif
            @if ($observacion->file_respuesta)
                <div class="text-right">
                    <a id="btnPractica" class="btn btn-secondary" wire:click="$emit('CargarModal','{{$observacion->file_respuesta}}','TESIS')">Ver informe Actualizado</a>
                </div>
            @endif
        </div>
    </div>
    @endforeach
    <div class="pt-3">
        <hr class="my-3">
        <form wire:submit.prevent="enviar">
            <h4 class="text-center">Agregar una nueva Observacion</h4>
            <textarea wire:model="mensaje" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
            @error('mensaje')
                <p class="text-danger">{{$message}}</p>
            @enderror
            <div class="text-right pt-3">            
                <button type="submit" class="btn btn-success">Enviar</button>
            </div>
        </form> 
    </div> 
</div>
