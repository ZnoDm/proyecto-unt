<div>
    <h2 class="text-2xl font-bold mt-4 text-center">JURADOS</h2>
        <h2 class="text-lg mb-7 text-center">Espere a que se pongan en contacto con usted, caso contrario comuniquese con sus asesores.</h2>

        <div class="rounded shadow-xl" wire:key="jurado-{{$jurados[0]->id.'-'.$jurados[0]->docente_id}}">
            <div class="px-6 py-4 flex justify-between">
                <div>
                    <p class="font-semibold text-lg ">{{$jurados[0]->docente->docente_nombre}}</p>
                    <span class="text-gray-500">{{$jurados[0]->puesto}}</span>
                </div>
                <div>
                    <a href="mailto:{{$jurados[0]->docente->docente_email}}" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow"><i class="fas fa-envelope"></i> Contacto</a>
                    <a wire:click="cargarObservaciones({{$jurados[0]->id}})" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded cursor-pointer">Observaciones</a>
                </div>
            </div>
            <div class="px-6 py-2 {{($open1)?'block':'hidden'}}">
                <hr class="my-2">
                @if ($observaciones->count())
                    @foreach ($observaciones as $observacion)
                        {{$observacion->id}}  
                    @endforeach
                    Responder
                    
                @else
                No tiene observaciones
                @endif
                
            </div>
        </div>

        <div class="rounded shadow-lg" wire:key="jurado-{{$jurados[1]->id.'-'.$jurados[1]->docente_id}}">
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2"></div>
                <x-jet-secondary-button
                wire:click="$set('open2',{{!$open2}})">
                    Abrir
                </x-jet-secondary-button>
            </div>
            <div class="px-6 pt-4 pb-2 {{($open2)?'block':'hidden'}}">
            {{$jurados[1]}}
            </div>
        </div>

        <div class="rounded shadow-lg" wire:key="jurado-{{$jurados[2]->id.'-'.$jurados[2]->docente_id}}">
            <div class="px-6 py-4">
                <div class="font-bold text-xl mb-2"></div>
                <x-jet-secondary-button
                wire:click="$set('open3',{{!$open3}})">
                    Abrir
                </x-jet-secondary-button>
            </div>
            <div class="px-6 pt-4 pb-2 {{($open3)?'block':'hidden'}}">
            {{$jurados[2]}}
            </div>
        </div>
</div>
