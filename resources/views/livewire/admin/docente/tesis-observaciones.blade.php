<div>
    

    @foreach($tesis as $tes)

    <div class="card">
        <div x-data="{open: false}" class="card-body px-5">
            <div class="d-flex">
                <div class="mr-auto">
                    <span>TITULO : {{$tes->tesis_titulo}}</span> <br>
                    <span>ALUMNO : {{$tes->alumno_apellido.' '.$tes->alumno_nombre}}</span> <br>                        
                    <span>INFORME FINAL <br> TESIS</span>   <br>                      
                    <button type="button" class="btn btn-info">Info</button>
                </div>
                <div>  
                    <button wire:click="$emit('')" class="btn btn-success" type="button"
                        data-bs-toggle="modal" data-bs-target="#exampleModal">
                            <i class="fas fa-thumbs-up"></i>
                    </button>
                </div>
        </div>
            <div class="row justify-content-md-center">
                <a wire:click="DameObservaciones({{$tes->tesis_id}})" x-show="!open" x-on:click="open = !open" class="cursor-pointer col-md-auto">
                    <i class="far fa-plus-square text-2xl mr-2 text-red-500"></i>
                    OBSERVACIONES
                </a>
            </div>
            <article x-show="open">
                <div>
                    <p class="fw-bold my-4">HISTORIAL</p>
                     @forelse ($observaciones as $item)
                        <div>
                            <p class="form-control"> {{$item->po_detalle}} </p>
                        </div>
                     @empty
                        <p>No tiene Observaciones</p>
                     @endforelse
                </div>
                <hr class="my-3">
                <div>
                    <div class="form-floating">
                        <p class="fw-bold my-4">NUEVA OBSERVACION</p>
                        <textarea wire:model="name" class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
                        
                        @error('name')
                        <span>
                            <strong class="text-danger">{{$message}}</strong>
                        </span>
                    @enderror
                    </div>

                    <div class="flex justify-end">
                        <button x-on:click="open = false" class="btn btn-primary">Cancelar</button>
                        <button wire:click="store({{$tes->alumno_id}})" class="btn btn-primary ml-2">Agregar</button>
                    </div>
                </div>
            </article>
        </div>
    </div>
        
    @endforeach
    
</div>
