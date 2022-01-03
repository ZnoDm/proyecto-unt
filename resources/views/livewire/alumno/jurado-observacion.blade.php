<div>
    @if ($observaciones->count())
        <h1 class="font-bold text-center mb-2">Observaciones: </h1>
        @foreach ($observaciones as $observacion)
        
            <div class="bg-blue-100 py-3 px-4 rounded-lg my-2">
				<p class="text-gray-500 font-semibold">{{$observacion->observacion}}</p>
            </div>
            @if ($loop->last)
                @php
                    $ultimo = $observacion->jo_status;
                    $ultimo_id = $observacion->id;
                @endphp
            @endif

        @endforeach

        @if ($ultimo==1)
        <form wire:submit.prevent="save({{$ultimo_id}})">            
            <hr class="my-3">
            <h1 class="font-bold text-center">Responder ultima observacion: </h1>
            <div class="py-3">
                <input type="text" name="mensaje_respuesta" wire:model="mensaje_respuesta" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-full-name" type="text" placeholder="Ingrese un mensaje">
                @error('mensaje_respuesta')
                    <span>
                        <strong class="text-red-500">{{$message}}</strong>
                    </span>
                @enderror
            </div>
            <div class="pb-2">
                <input type="file" name="file_tesis" wire:model="file_tesis" id="file_tesis" class="w-full" accept=".pdf">
                @error('file_tesis')
                    <span>
                        <strong class="text-red-500">{{$message}}</strong>
                    </span>
                @enderror
            </div>
            <div class="flex justify-center">
                
                <button type="submit" class="text-sm font-bold bg-green-500 hover:bg-green-700 text-white py-2 px-3 rounded cursor-pointer ml-2">Enviar Respuesta</button>
            </div>
        </form>
        @else
            <DIV class="py-3 text-right">
                ESTADO: RESPUESTA ENVIADA
            </DIV>
        @endif
    @else
        NO TIENE OBSERVACIONES DEL JURADO
    @endif
    
    
</div>
