<div>
    @if ($observaciones->count())
        <h1 class="font-bold text-center mb-2">Observaciones: </h1>
        @foreach ($observaciones as $observacion)
        
            <div class="bg-blue-100 py-3 px-4 rounded-lg">
                <h1 class="text-gray-700 font-bold tracking-wider">{{$observacion->created_at}}</h1>
				<p class="text-gray-500 font-semibold">Two-factor authentication adds an extra layer of security to
					your account. To log in, in addition you'll need to provide a 6 digit code</p>
            </div>

        @endforeach

        <form wire:submit.prevent="enviar">
            <hr class="my-3">
            <h1 class="font-bold text-center">Responder ultima observacion: </h1>
            <div class="py-3">
                <input type="text" name="mensaje_respuesta" wire:model="jurado.mensaje_respuesta" class="bg-gray-200 appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700 leading-tight focus:outline-none focus:bg-white focus:border-purple-500" id="inline-full-name" type="text" placeholder="Ingrese un mensaje">
                @error('jurado.file_tesis')
                    <span>
                        <strong class="text-red-500">{{$message}}</strong>
                    </span>
                @enderror
            </div>
            <div class="pb-2">
                <input type="file" name="file_tesis" wire:model="jurado.file_tesis" id="file_tesis" class="w-full" accept=".pdf">
                @error('jurado.file_tesis')
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
        NO TIENE OBSERVACIONES DEL JURADO
    @endif
    
    
</div>
