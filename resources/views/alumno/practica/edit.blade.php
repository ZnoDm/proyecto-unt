<x-alumno-layout>

    @if ($observacion != '' and ($practica->practica_status==8 or $practica->practica_status==9))
        <div role="alert">
            <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
              Observaciones de {{($practica->practica_status==8)?' Secretaria':' Direccion'}}
            </div>
            <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
              <p>{{$observacion->po_detalle}}</p>
            </div>
          </div>
        <hr class="my-3">
    @endif
    {{--Actulizar Solicitud--}}
    <h1 class="text-center text-xl font-bold">Actualizar Solicitud de Practica</h1>
    <form action="{{route('tramite.practica.update',$practica)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
    
        @if ($practica->practica_status != 9)
            <div>
                <h2 class="font-bold mb-1">Voucher </h2>
        
                <div class="mb-2 grid grid-cols-2 gap-4 px-2">
                    <div class="col-span-2">
                        <label for="nro">Número de Operacion:
                            <input type="text" name="nro" id="nro" class="w-full" value="{{old('nro',$practica->vouchers->first()->voucher_nro)}}">
                            @error('nro')
                                <span>
                                    <strong class="text-red-500">{{$message}}</strong>
                                </span>
                            @enderror
                        </label>
                    </div>            
                    
                    <div>
                        <label class="col-span-2" for="file_voucher">Adjunte Recibo:
                            <input type="file" name="file_voucher" id="file_voucher" class="w-full" accept="image/*">
                            @error('file_voucher')
                                <span>
                                    <strong class="text-red-500">{{$message}}</strong>
                                </span>
                            @enderror
                        </label>
                    </div>
        
                    <div class="grid justify-items-end my-2">
                        <!-- Button Modal -->
                        <a id="btnVoucher" class="cursor-pointer bg-green-200 hover:bg-green-300 text-green-800 font-bold py-2 px-4 rounded inline-flex items-center">
                            <i class="fas fa-eye"></i>
                            <span class="ml-2">Preview</span>
                        </a>
                    </div>
        
                </div>
            </div>
        
            <hr class="my-3">
        
            <div>
                <h2 class="font-bold mb-1">Formato Único de Trámite</h2>
                <div class="my-4 grid grid-cols-2 gap-4 px-2">            
                    <div>
                        <label for="file_fut" class="col-span-2">Adjunte archivo FUT
                        <input type="file" name="file_fut" id="file_fut" class="w-full" accept=".pdf">
                        @error('file_fut')
                            <span>
                                <strong class="text-red-500">{{$message}}</strong>
                            </span>
                        @enderror                
                        </label>
                    </div>
                    <div class="grid justify-items-end  my-2">
                        <!-- Button Modal -->
                        <a id="btnFut" class="cursor-pointer bg-green-200 hover:bg-green-300 text-green-800 font-bold py-2 px-4 rounded inline-flex items-center">
                            <i class="fas fa-eye"></i>
                            <span class="ml-2">Preview</span>
                        </a>
                    </div>
                </div>
            </div>
        
            <hr class="my-3">
            
        @endif
    
        <div>
            <h2 class="font-bold mb-1">Plan de Prácticas</P></h2>
            
            <div class="mb-4 grid grid-cols-2 gap-4 px-2"> 
                @if ($practica->practica_status != 9)
                    <div>
                        <label for="fecha_inicio">Fecha de Inicio</label>
                        <input type="date" name="fecha_inicio" id="fecha_inicio" class="w-full" value="{{old('fecha_inicio',$practica->practica_fechainicio)}}" >
                        @error('fecha_inicio')
                            <span>
                                <strong class="text-red-500">{{$message}}</strong>
                            </span>
                        @enderror
                    </div>
                    <div>
                        <label for="fecha_fin">Fecha a Finalizar </label>
                        <input type="date" name="fecha_fin" id="fecha_fin" class="w-full" value="{{old('fecha_fin',$practica->practica_fechafin)}}">
                        @error('fecha_fin')
                            <span>
                                <strong class="text-red-500">{{$message}}</strong>
                            </span>
                        @enderror
                    </div>
                
                @endif
    
                <div>
                    <label for="file_practica" class="col-span-2">Adjunte Plan de Practicas
                    <input type="file" name="file_practica" id="file_practica" class="w-full" accept=".pdf">
                    @error('file_practica')
                        <span>
                            <strong class="text-red-500">{{$message}}</strong>
                        </span>
                    @enderror
                    </label>
                </div>
                <div class="grid justify-items-end my-2">
                    <!-- Button Modal -->
                    <a id="btnPlan" class="cursor-pointer bg-green-200 hover:bg-green-300 text-green-800 font-bold py-2 px-4 rounded inline-flex items-center">
                        <i class="fas fa-eye"></i>
                        <span class="ml-2">Preview</span>
                    </a>
                </div>
                    
                @if ($practica->practica_status != 9)
                    <div class="col-span-2">
                        <label for="fecha_fin">Asesor 
                        <select name="docente_id" id="docente_id" class="w-full">
                            <option value="-1" disabled>Lista de Docentes</option>
                            @foreach ($docentes as $docente)
                                <option value="{{$docente->id}}" {{ $docente->id == $practica->docente_id ? 'selected':''}}> {{ucwords(strtolower($docente->docente_nombre))}}</option>
                            @endforeach
                        </select>
                        @error('docente_id')
                        <span>
                            <strong class="text-red-500">{{$message}}</strong>
                        </span>
                        @enderror
                        </label>
                    </div>
                    <h2 class="font-bold col-span-2">Empresa </h2>
                    <div>
                        <label for="ruc">RUC:</label>
                        <input type="text" name="ruc" id="ruc" class="w-full" value="{{old('ruc',$practica->empresa->empresa_ruc)}}">
                        @error('ruc')
                            <span>
                                <strong class="text-red-500">{{$message}}</strong>
                            </span>
                        @enderror
                    </div>
                    <div>
                        <label for="nombre">Razón Social:</label>
                        <input type="text" name="nombre" id="nombre" class="w-full" value="{{old('nombre',$practica->empresa->empresa_razonsocial)}}">
                        @error('nombre')
                            <span>
                                <strong class="text-red-500">{{$message}}</strong>
                            </span>
                        @enderror
                    </div>
        
                    <div class="col-span-2">
                        <label for="representante">Representante</label>
                        <input type="text" name="representante" id="representante" class="w-full" value="{{old('representante',$practica->empresa->empresa_representante)}}">
                        @error('representante')
                            <span>
                                <strong class="text-red-500">{{$message}}</strong>
                            </span>
                        @enderror
                    </div>
        
                    <div>
                        <label for="supervisor">Supervisor</label>
                        <input type="text" name="supervisor" id="supervisor" class="w-full" value="{{old('supervisor',$practica->empresa->empresa_supervisor)}}">
                        @error('supervisor')
                            <span>
                                <strong class="text-red-500">{{$message}}</strong>
                            </span>
                        @enderror
                    </div>
                    <div>
                        <label for="telefono">Telefono</label>
                        <input type="text" name="telefono" id="telefono" class="w-full" value="{{old('telefono',$practica->empresa->empresa_telefono)}}">
                        @error('telefono')
                            <span>
                                <strong class="text-red-500">{{$message}}</strong>
                            </span>
                        @enderror
                    </div>
                @endif
            </div>
        </div>
        
        <input type="submit" value="Actualizar Informacion" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded w-full mt-2 cursor-pointer">        
    
    </form> 
    {{--Fin Actulizar Solicitud--}}   
    <div id="modalVoucher" class="hidden fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">                    
                    <span class="close" id="closeVoucher">&times;</span>
                    <div class="mt-2">
                        <img id="previewVoucher" src="{{$practica->vouchers->first()->voucher_url}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal -->
    <div id="modalFUT" class="modal">

        <!-- Modal content -->
        <div class="modal-content" overflow: scroll;>
            <span class="close" id="closeFUT">&times;</span>
            <embed src="{{$practica->futs->first()->fut_url}}" id="previewFUT" type="application/pdf" style="height: 92%; width: 100%;">
        </div>
    </div>

    <!-- Modal -->
    <div id="modalPlan" class="modal">

        <!-- Modal content -->
        <div class="modal-content" overflow: scroll;>
            <span class="close" id="closePlan">&times;</span>
            <embed id="previewPlan" type="application/pdf" style="height: 92%; width: 100%;" src="{{$practica->practica_file_practica_url}}">
        </div>
    </div>

    @push('scripts')
        <script>
            
            let file_voucher = document.querySelector('#file_voucher');      
            let modal = document.querySelector("#modalVoucher");
            let span = document.querySelector("#closeVoucher");             
            let contenidoModal = document.querySelector('#previewVoucher'); 
            let boton = document.querySelector('#btnVoucher')

            span.onclick = function() {
                modal.style.display = "none";
            }
            window.onclick = ()=> {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
                        
            file_voucher.addEventListener('change', () => {
                let pdffFileURL = URL.createObjectURL(file_voucher.files[0]) + "#toolbar=0";
                contenidoModal.setAttribute('src', pdffFileURL);
            });

            boton.onclick = ()=>{                    
                    modal.style.display = "block";
            }        
        </script>

        <script>
                
            let file_fut = document.querySelector('#file_fut');      
            let modal_FUT = document.querySelector("#modalFUT");
            let span_FUT = document.querySelector("#closeFUT");             
            let contenidoModal_FUT = document.querySelector('#previewFUT'); 
            let btnFut = document.querySelector('#btnFut')

            span_FUT.onclick = function() {
                modal_FUT.style.display = "none";
            }
            window.onclick = ()=> {
                if (event.target == modal_FUT) {
                    modal_FUT.style.display = "none";
                }
            }
                        
            file_fut.addEventListener('change', () => {
                let pdffFileURL = URL.createObjectURL(file_fut.files[0]) + "#toolbar=0";
                contenidoModal_FUT.setAttribute('src', pdffFileURL);
            });

            btnFut.onclick = ()=>{             
                    modal_FUT.style.display = "block";
            }        
        </script>

        <script>
                    
            let file_Plan = document.querySelector('#file_practica');      
            let modal_Plan = document.querySelector("#modalPlan");
            let span_Plan = document.querySelector("#closePlan");             
            let contenidoModal_Plan = document.querySelector('#previewPlan'); 
            let btnPlan = document.querySelector('#btnPlan')

            span_Plan.onclick = function() {
                modal_Plan.style.display = "none";
            }
            window.onclick = ()=> {
                if (event.target == modal_Plan) {
                    modal_Plan.style.display = "none";
                }
            }
                        
            file_Plan.addEventListener('change', () => {
                let pdffFileURL = URL.createObjectURL(file_Plan.files[0]) + "#toolbar=0";
                contenidoModal_Plan.setAttribute('src', pdffFileURL);
            });

            btnPlan.onclick = ()=>{             
                modal_Plan.style.display = "block";
                
            }        
        </script>
    @endpush
    
</x-alumno-layout>