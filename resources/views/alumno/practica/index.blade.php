<x-alumno-layout>
    
    <h1 class="text-2xl font-bold text-center">PROCESO DE PRACTICAS</h1> 
    <div class="flex justify-end mb-2">
        <a class="bg-pink-500 hover:bg-pink-700 text-white font-bold py-2 px-4 rounded" href="{{route('tramite.practica.create')}}">Nueva solicitud</a>
    </div>

    @if (session('info'))
        <div id="alerta-practica" class="bg-green-200 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Success!</strong>
            <span class="block sm:inline">{{session('info')}}</span>
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3" id="alerta-close-practica"" >
            <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
            </span>
        </div>
        @push('scripts')
            <script>
                document.querySelector('#alerta-close-practica').onclick = () => {
                    document.querySelector('#alerta-practica').style.display = "none";
                }
            </script>
                
        @endpush
    @endif

    <table class="min-w-full divide-y divide-gray-200 my-5 text-center">
        <thead class="bg-gray-50 text-center">
            <tr>
                <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Descripcion
                </th>                
                <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Status
                </th>
                <th scope="col" class="px-6 py-3 text-xs font-medium text-gray-500 uppercase tracking-wider">
                    Observaciones
                </th>
                <th scope="col" class="relative px-6 py-3">
                    <span class="sr-only">Edit</span>
                </th>
            </tr>
        </thead>

        <tbody class="bg-white divide-y divide-gray-200 text-center">
        @if ($practicas->count())
            @foreach ($practicas as $practica)
                @php
                    $status= $practica->practica_status;
                @endphp
                <tr>
                    <td>
                        {{$practica->id}}
                    </td>
                    
                    <td class="px-6 py-4 whitespace-nowrap">
                        @switch($status)
                            @case(3)
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                    Aceptado
                                </span>                                
                                @break
                            @case(4)
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-red-800">
                                    Revision
                                </span>
                                @break                           
                            @case(6)
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-indigo-100 text-indigo-800">
                                    Finalizada
                                </span>
                                @break
                            @case(8)
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-yellow-800">
                                    Denegado
                                </span>
                                @break
                            @case(9)
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-yellow-800">
                                    Denegado
                                </span>
                                @break
                            @case(10)
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-yellow-800">
                                    Denegado
                                </span>
                                @break
                            @case(11)
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-yellow-800">
                                    Denegado
                                </span>
                                @break
                            @default
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-red-800">
                                    Revision
                                </span>
                            @break
                        @endswitch  
                    </td>
                    <td>
                        @if ($status == 8 or $status == 9 or $status == 10 or $status == 11) SI @else NINGUNA @endif
                    </td>                    
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        @if ($status ==3)                    
                            {{--Puede nviar su informe final (por primera vez se crea)--}}  
                            <a href="{{route('tramite.practica.informefinal.create',$practica)}}" class="bg-pink-500 hover:bg-pink-700 text-white font-bold py-2 px-4 rounded mt-5 cursor-pointer">INFORME FINAL</a>
                        @else
                            @if ($status==10 or $status==11)
                                {{--Deniega informe final $sattus=10 (Secretaria) y 11(Director)--}}  
                                <a href="{{route('tramite.practica.informefinal.edit',$practica)}}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mt-5 cursor-pointer">UPDATE INFORME</a>
                            @else
                                @if ($status==8 or $status==9)
                                    {{--Deniega solicitud $sattus=8 (Secretaria) y 9 (Director)--}}            
                                    <a href="{{route('tramite.practica.edit',$practica)}}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded mt-5 cursor-pointer">UPDATE SOLICITUD</a>
                                @else  
                                    <a href="{{route('tramite.practica.show',$practica)}}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mt-5 cursor-pointer">PROGRESO</a>
                                @endif
                            @endif
                        @endif
                    </td>
                </tr>  
            @endforeach
        @else
            <tr>
                <td colspan="4" class="text-center">
                    No tiene ninguna solicitud pendiente.
                </td>
            </tr>
        @endif
    
        </tbody>
    </table>
    <hr>

    <!-- GUIA DE PROCEDIMIENTOS -->
    <div class="mx-auto relative pt-20">
        <h1 class="text-xl text-center font-bold text-blue-600">PROCEDIMIENTO Y REQUISITOS DE PRÁCTICAS</h1>
        <div class="border-l-2 mt-10">
        <!-- Card 1 -->
        <div class="transform transition cursor-pointer hover:-translate-y-2 ml-10 relative flex items-center px-6 py-4 bg-gray-600 text-white rounded mb-10 flex-col md:flex-row space-y-4 md:space-y-0">
            <div class="w-5 h-5 bg-gray-600 absolute -left-10 transform -translate-x-2/4 rounded-full z-10 mt-2 md:mt-0"></div>
            <div class="w-10 h-1 bg-gray-300 absolute -left-10 z-0"></div>
            <!-- Content that showing in the box -->
            <div class="flex-auto">
                <h2 class="font-bold">VOUCHER DE TRÁMITE</h2>
                <h3>Voucher de trámite S/. 5.00 (grabado en un solo archivo)</h3>
            </div>
            <div class="text-center px-3"><img src="{{asset('img/recursos/logo-financiera-confianza.png')}}" class="object-contain w-56"></div>
            <div class="text-center px-3"><img src="{{asset('img/recursos/logo-interbank.png')}}" class="object-contain w-36"></div>
        </div>

        <!-- Card 2 -->
        <div class="transform transition cursor-pointer hover:-translate-y-2 ml-10 relative flex items-center px-6 py-4 bg-blue-600 text-white rounded mb-10 flex-col md:flex-row space-y-4 md:space-y-0">
            <!-- Dot Follwing the Left Vertical Line -->
            <div class="w-5 h-5 bg-blue-600 absolute -left-10 transform -translate-x-2/4 rounded-full z-10 mt-2 md:mt-0"></div>

            <!-- Line that connecting the box with the vertical line -->
            <div class="w-10 h-1 bg-blue-300 absolute -left-10 z-0"></div>

            <!-- Content that showing in the box -->
            <div class="flex-auto">
            <h1 class="font-bold">FORMATO ÚNICO DE TRÁMITE - FUT</h1>
            <h3>Grabado en un solo archivo.</h3>
            </div>
            <a href="{{asset('img/archivos/FORMATO UNICO DE TRAMITE - FUT 2020.docx')}}" class="text-center text-white hover:text-gray-300"><i class="fas fa-download"></i> Download</a>
        </div>

        <!-- Card 3 -->
        
        <div class="transform transition cursor-pointer hover:-translate-y-2 ml-10 relative flex items-center px-6 py-4 bg-pink-600 text-white rounded mb-10 flex-col md:flex-row space-y-4 md:space-y-0">
            <!-- Dot Follwing the Left Vertical Line -->
            <div class="w-5 h-5 bg-pink-600 absolute -left-10 transform -translate-x-2/4 rounded-full z-10 mt-2 md:mt-0"></div>

            <!-- Line that connecting the box with the vertical line -->
            <div class="w-10 h-1 bg-pink-300 absolute -left-10 z-0"></div>

            <!-- Content that showing in the box -->
            <div class="flex-auto">
            <h1 class="font-bold">ARCHIVO PLAN DE PRACTICA</h1>
            <h3>Un (01) ejemplar del Plan de Prácticas (grabado en un solo archivo).</h3>
            </div>
        </div>

        <!-- Card 4 -->
        <div class="transform transition cursor-pointer hover:-translate-y-2 ml-10 relative flex items-center px-6 py-4 bg-green-600 text-white rounded mb-10 flex-col md:flex-row space-y-4 md:space-y-0">
            <!-- Dot Follwing the Left Vertical Line -->
            <div class="w-5 h-5 bg-green-600 absolute -left-10 transform -translate-x-2/4 rounded-full z-10 mt-2 md:mt-0"></div>

            <!-- Line that connecting the box with the vertical line -->
            <div class="w-10 h-1 bg-green-300 absolute -left-10 z-0"></div>

            <!-- Content that showing in the box -->
            <div class="flex-auto">
            <h1 class="font-bold">HACER SU SOLICITUD DE PRACTICA</h1>
            <h3>Formato unico de trámite</h3>
            </div>
        </div>
    </div>
</x-alumno-layout>