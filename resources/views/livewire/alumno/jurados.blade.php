<div>
    <h2 class="text-2xl font-bold mt-4 text-center">JURADOS</h2>
        <h2 class="text-lg mb-7 text-center">Espere a que se pongan en contacto con usted, caso contrario comuniquese con sus asesores.</h2>
        @foreach ($jurados as $jurado)
        <article class="mb-6" x-data="{open:false}">
            <div class="rounded shadow-xl px-6 py-4 bg-gray-100 x-data="{open:true}">
                <div class="px-6 py-4 flex justify-between">
                    <div>
                        <p class="font-semibold text-lg ">{{$jurado->docente->docente_nombre}}</p>
                        <span class="text-gray-500">{{$jurado->puesto}}</span>
                    </div>
                    <div>
                        <a href="mailto:{{$jurado->docente->docente_email}}" class="bg-white hover:bg-gray-100 text-gray-800 font-semibold py-2 px-4 border border-gray-400 rounded shadow"><i class="fas fa-envelope"></i> Contacto</a>
                        <a x-on:click="open = !open" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded cursor-pointer">Ver</a>
                    </div>
                </div>
                <div class="px-6 py-2" x-show="open">
                    <span class="text-gray-500">Codigo: COD-{{$jurado->id}}</span> <br>
                    <span class="text-gray-500">Correo: {{$jurado->docente->docente_email}}</span> <br>
                    <span class="text-gray-500">Telefono: {{$jurado->docente->docente_telefono}}</span> <br>
                    <hr class="my-2">
                    @livewire('alumno.jurado-observacion', ['jurado' => $jurado], key($jurado->id))
                </div>
            </div>
        </article>
        @endforeach
        

</div>
