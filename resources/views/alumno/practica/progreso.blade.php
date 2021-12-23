<x-alumno-layout>
    @php
        $status = $practica->practica_status;
    @endphp
    {{-- Barra de Progreso --}}
    @if($status ==1 or $status==2 or $status == 4 or $status ==5 or $status ==6)
        <h2 class="text-xl font-bold mb-5">PROGRESO</h2>
        <div>	
            <div class="flex pb-3">
                <div class="flex-1">
                </div>

                <div class="flex-1">
                    <div class="{{($status==1 or $status==2) ? 'border-2' : 'bg-green-500 text-white'}} w-10 h-10 mx-auto rounded-full text-lg flex items-center">
                        <span class="text-center w-full"> @if ($status==1 or $status==2) <i class="fas fa-question"></i> @else <i class="fas fa-check"></i> @endif </span>
                    </div>
                    <div class="text-center pt-2">
                        Aceptada
                    </div>
                </div>
                
                <div class="w-1/4 align-center items-center align-middle content-center flex item pb-6">
                    <div class="w-full bg-gray-200 rounded items-center align-middle align-center flex-1">
                        <div class="bg-green-500 text-xs leading-none py-1 text-center rounded " style="width: {{($status==1 or $status==2) ? '0%' : '100%'}}"></div>
                    </div>
                </div>
            
                <div class="flex-1">
                    <div class="{{($status==6) ? 'bg-green-500 text-white': 
                                (($status==9) ? 'bg-red-500 text-white':'border-2')}} 
                                w-10 h-10 mx-auto rounded-full text-lg  flex items-center">
                        <span class="text-center w-full">
                            @switch($status)
                                @case(4)
                                    <i class="fas fa-question"></i>
                                    @break
                                @case(5)
                                    <i class="fas fa-question"></i>
                                    @break
                                @case(6)
                                    <i class="fas fa-check"></i>
                                    @break
                                @default
                                    2
                            @endswitch
                        </span>
                    </div>
                    <div class="text-center pt-2">
                        Informe Final
                    </div>
                </div>
            
                <div class="w-1/4 align-center items-center align-middle content-center flex pb-6">
                    <div class="w-full bg-gray-200 rounded items-center align-middle align-center flex-1">
                        <div class="bg-green-500 text-xs leading-none py-1 text-center rounded " style="width: {{($status==6) ? '100%' : '0%'}}"></div>
                    </div>
                    
                </div>
            
                <div class="flex-1">
                    <div class="{{($status==6) ? 'bg-green-500 text-white' : 'border-2'}} w-10 h-10 mx-auto rounded-full text-lg  flex items-center">
                        <span class="text-center w-full">
                            @if ($status ==6) <i class="fas fa-check"></i>
                            @else 3
                            @endif
                        </span>
                    </div>
                    <div class="text-center pt-2">
                        Finalizada
                    </div>
                </div>

                <div class="flex-1">
                </div>		
            </div>
        </div>
    @endif
    {{-- Fin Barra de Progreso --}}

    {{-- Informe Final --}}
    @if($status ==1 or $status==2 or $status == 4 or $status ==5)
        <h2 class="text-xl font-bold mt-4 text-center">INFORME EN REVISION</h2>
        <P class="font-bold text-center">Puede tomar 7 días hábiles</P>
        <div class="text-center">
            <img src="https://media0.giphy.com/media/3o6fIV0MMLjnuLEazK/giphy.gif?cid=ecf05e47aouav5doxscp2ph7dzp5ucr7w7xd2sardhbyhvgq&rid=giphy.gif&ct=g" class="mx-auto">
        </div>
    @else
        @if($status ==6)
            <h2 class="text-xl font-bold mt-4 text-center">PROCESO FINALIZADO</h2>
            <P class="font-bold text-center">Good Job</P>
            <div class="text-center">
                <img src="https://media4.giphy.com/media/5hgYDDh5oqbmE4OKJ3/giphy.gif?cid=ecf05e47g6fn83373oqgmtj54sks5s4nknq8xe0wu6whjnsi&rid=giphy.gif&ct=g" class="mx-auto">
            </div>
        @else
            <h2 class="text-xl font-bold mt-4 text-center">NO ESTA EN EL FLUJO, FALTAN ENVIAR DOCUMENTOS</h2>
        @endif
    @endif
    
</x-alumno-layout>