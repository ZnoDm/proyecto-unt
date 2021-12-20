<x-alumno-layout>
    <h1 class="text-center text-xl font-bold">Solicitud de Practica</h1>
    @if (session('info'))
        <div id="alerta" class="bg-green-200 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Success!</strong>
            <span class="block sm:inline">{{session('info')}}</span>
            <span class="absolute top-0 bottom-0 right-0 px-4 py-3" id="alerta-close" >
            <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
            </span>
        </div>
    @endif
    <form name="form" action="{{route('tramite.practica.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <h2 class="font-bold mb-1">Voucher </h2>

            <div class="mb-2 grid grid-cols-2 gap-4 px-2">
                <div class="col-span-2">
                    <label for="nro">Número de Operacion:
                        <input type="text" name="nro" id="nro" class="w-full" value="{{old('nro')}}">
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
                    <a id="btnVoucher" class="cursor-pointer bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
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
                    <a id="btnFut" class="cursor-pointer bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
                        <i class="fas fa-eye"></i>
                        <span class="ml-2">Preview</span>
                    </a>
                </div>
            </div>
        </div>

        <hr class="my-3">

        <div>
            <h2 class="font-bold mb-1">Plan de Prácticas</P></h2>
            <div class="mb-4 grid grid-cols-2 gap-4 px-2"> 
                <div>
                    <label for="fecha_inicio">Fecha de Inicio</label>
                    <input type="date" name="fecha_inicio" id="fecha_inicio" class="w-full" value="{{date('Y-m-d')}}" min="{{date('Y-m-d')}}" >
                    @error('fecha_inicio')
                        <span>
                            <strong class="text-red-500">{{$message}}</strong>
                        </span>
                    @enderror
                </div>
                <div>
                    <label for="fecha_fin">Fecha a Finalizar </label>
                    <input type="date" name="fecha_fin" id="fecha_fin" class="w-full" value="{{date('Y-m-d', strtotime('+30 day', strtotime(date('Y-m-d'))))}}" min="{{date('Y-m-d', strtotime('+30 day', strtotime(date('Y-m-d'))))}}">
                    @error('fecha_fin')
                        <span>
                            <strong class="text-red-500">{{$message}}</strong>
                        </span>
                    @enderror
                </div>

                <div>
                    <label for="file_practica" class="col-span-2">Adjunte Plan de Practicas </label>
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
                    <a id="btnPlan" class="cursor-pointer bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
                        <i class="fas fa-eye"></i>
                        <span class="ml-2">Preview</span>
                    </a>
                </div>
                
                <div class="col-span-2">
                    <label for="fecha_fin">Asesor 
                    <select name="docente_id" id="docente_id" class="w-full">
                        <option value="-1">Lista de Docentes</option>
                        @foreach($docentes as $docente)
                            <option value="{{$docente->id}}">{{ucwords(strtolower($docente->docente_nombre))}}</option>
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
                    <input type="text" name="ruc" id="ruc" class="w-full" value="{{old('ruc')}}">
                    @error('ruc')
                        <span>
                            <strong class="text-red-500">{{$message}}</strong>
                        </span>
                    @enderror
                </div>
                <div>
                    <label for="nombre">Razón Social:</label>
                    <input type="text" name="nombre" id="nombre" class="w-full" value="{{old('nombre')}}">
                    @error('nombre')
                        <span>
                            <strong class="text-red-500">{{$message}}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col-span-2">
                    <label for="representante">Representante</label>
                    <input type="text" name="representante" id="representante" class="w-full" value="{{old('representante')}}">
                    @error('representante')
                        <span>
                            <strong class="text-red-500">{{$message}}</strong>
                        </span>
                    @enderror
                </div>

                <div>
                    <label for="supervisor">Supervisor</label>
                    <input type="text" name="supervisor" id="supervisor" class="w-full" value="{{old('supervisor')}}">
                    @error('supervisor')
                        <span>
                            <strong class="text-red-500">{{$message}}</strong>
                        </span>
                    @enderror
                </div>
                <div>
                    <label for="telefono">Telefono</label>
                    <input type="text" name="telefono" id="telefono" class="w-full" value="{{old('telefono')}}">
                    @error('telefono')
                        <span>
                            <strong class="text-red-500">{{$message}}</strong>
                        </span>
                    @enderror
                </div>
            </div>
        </div>
        
    
        <input type="button" onclick="confirmacion()" value="Solicitar" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded w-full mt-2 cursor-pointer">
    </form>
    <!-- Modal -->
    <div id="modalVoucher" class="hidden fixed z-10 inset-0 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true"></div>
            <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                    
                    <span class="close" id="closeVoucher">&times;</span>
                    <div class="mt-2"><img id="previewVoucher" src="https://images.pexels.com/photos/10502143/pexels-photo-10502143.jpeg?auto=compress&amp;cs=tinysrgb&amp;dpr=3&amp;h=750&amp;w=1260" alt="">
                          </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div id="modalFUT" class="modal">
        <div class="modal-content" overflow: scroll;>
            <span class="close" id="closeFUT">&times;</span>
            <embed id="previewFUT" type="application/pdf" style="height: 92%; width: 100%;">
        </div>
    </div>

    <!-- Modal -->
    <div id="modalPlan" class="modal">
        <div class="modal-content" overflow: scroll;>
            <span class="close" id="closePlan">&times;</span>
            <embed id="previewPlan" type="application/pdf" style="height: 92%; width: 100%;">
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
                boton.classList.remove('bg-gray-300','text-gray-800','hover:bg-gray-400');
                boton.classList.add('bg-green-300','hover:bg-green-400');
            });

            boton.onclick = ()=>{                        
                if(file_voucher.files[0]){                
                    modal.style.display = "block";
                }
                else{
                    Swal.fire({
                        imageUrl: 'https://media.giphy.com/media/tXL4FHPSnVJ0A/giphy.gif',
                        imageAlt: 'Agrege un archivo',
                        title: 'Oops...',
                        text: 'Agrega un archivo!',
                    })
                }
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
                
                btnFut.classList.remove('bg-gray-300','text-gray-800','hover:bg-gray-400');
                btnFut.classList.add('bg-green-300','hover:bg-green-400');
            });

            btnFut.onclick = ()=>{
                        
                if(file_fut.files[0]){                
                    modal_FUT.style.display = "block";
                }
                else{
                    Swal.fire({
                        imageUrl: 'https://media.giphy.com/media/tXL4FHPSnVJ0A/giphy.gif',
                        imageAlt: 'Agrege un archivo',
                        title: 'Oops...',
                        text: 'Agrega un archivo!',
                    })
                }
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
                
                btnPlan.classList.remove('bg-gray-300','text-gray-800','hover:bg-gray-400');
                btnPlan.classList.add('bg-green-300','hover:bg-green-400');
            });

            btnPlan.onclick = ()=>{
                        
                if(file_Plan.files[0]){                
                    modal_Plan.style.display = "block";
                }
                else{
                    Swal.fire({
                        imageUrl: 'https://media.giphy.com/media/tXL4FHPSnVJ0A/giphy.gif',
                        imageAlt: 'Agrege un archivo',
                        title: 'Oops...',
                        text: 'Agrega un archivo!',
                    })
                }
            }        
        </script>
        <script>
            function confirmacion(){
                Swal.fire({
                title: 'Esta seguro?',
                text: "Esta apunto de enviar una solicitud de practica",
                icon: 'warning',
                showCancelButton: true,
                cancelButtonText: 'Cancelar',
                confirmButtonColor: '#2ECC71',
                cancelButtonColor: '#d33',
                confirmButtonText: 'De Acuerdo!'
                }).then((result) => {
                if (result.isConfirmed) {                  
                    document.form.submit()
                }
                })
            }
        </script>
    @endpush
    
</x-alumno-layout>