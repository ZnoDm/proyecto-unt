<x-alumno-layout>
    
    <h1 class="text-center text-xl font-bold">Nueva Solicitud de Tesis</h1>
    <form action="{{route('tramite.tesis.store')}}" method="POST" enctype="multipart/form-data">
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
                    <a id="btnVoucher" class="cursor-pointer bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
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
                    <a id="btnFut" class="cursor-pointer bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
                        <i class="fas fa-eye"></i>
                        <span class="ml-2">Preview</span>
                    </a>
                </div>
            </div>
        </div>

        <hr class="my-3">

        <div>
            <h2 class="font-bold mb-1">Tesis: </h2>
            <div class="mb-4 grid grid-cols-2 gap-4 px-2">
                <div class="col-span-2">
                    <label for="fecha_inicio">Titulo</label>
                    <input type="text" name="titulo" id="titulo" class="w-full" value="{{old('titulo')}}">
                    @error('titulo')
                        <span>
                            <strong class="text-red-500">{{$message}}</strong>
                        </span>
                    @enderror    
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

                <div class="col-span-2">
                    <label for="file_tesis" >Documento F-003-B FORMATO DE TITULO</label>
                    <span>
                        <p>Debe ser firmado por el asesor de lo contrario, será rechazado
                    </span>
                </div>
                <input type="file" name="file_tesis" id="file_tesis" class="w-full" accept=".pdf">
                @error('file_tesis')
                    <span>
                        <strong class="text-red-500">{{$message}}</strong>
                    </span>
                @enderror
                </label>

                <div class="grid justify-items-end my-2">
                    <!-- Button Modal -->
                    <a id="btnPlan" class="cursor-pointer bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
                        <i class="fas fa-eye"></i>
                        <span class="ml-2">Preview</span>
                    </a>
                </div>
 
            </div>
        </div>
      
        <input type="submit" value="Solicitar" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded w-full mt-2 cursor-pointer">
    </form>
    
    <!-- Modal -->
    <div id="modalVoucher" class="modal">

        <!-- Modal content -->
        <div class="modal-content" overflow: scroll;>
            <span class="close" id="closeVoucher">&times;</span>
            <img src="" alt="" id="previewVoucher" style="padding: 10px 30%" >
        </div>
    </div>

    <!-- Modal -->
    <div id="modalFUT" class="modal">

        <!-- Modal content -->
        <div class="modal-content" overflow: scroll;>
            <span class="close" id="closeFUT">&times;</span>
            <embed id="previewFUT" type="application/pdf" style="height: 92%; width: 100%;">
        </div>
    </div>

    <!-- Modal -->
    <div id="modalPlan" class="modal">

        <!-- Modal content -->
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
    @endpush
    
</x-alumno-layout>