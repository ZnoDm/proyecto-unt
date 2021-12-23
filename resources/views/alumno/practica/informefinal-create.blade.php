<x-alumno-layout>
    <h1 class="text-center text-xl font-bold">Informe Final de Practica</h1>
    {{-- Informe Final --}}
    <form action="{{route('tramite.practica.informefinal.store',$practica)}}" method="POST" enctype="multipart/form-data">
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
        <div>
            <h2 class="font-bold mb-1">Informe Final</h2>
            <div class="my-4 grid grid-cols-2 gap-4 px-2">            
                <div>
                    <label for="file_informefinal" class="col-span-2">Adjunte Informe Final
                    <input type="file" name="file_informefinal" id="file_informefinal" class="w-full" accept=".pdf">
                    @error('file_informefinal')
                        <span>
                            <strong class="text-red-500">{{$message}}</strong>
                        </span>
                    @enderror                
                    </label>
                </div>
                <div class="grid justify-items-end  my-2">
                    <!-- Button Modal -->
                    <a id="btnInformefinal" class="cursor-pointer bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
                        <i class="fas fa-eye"></i>
                        <span class="ml-2">Preview</span>
                    </a>
                </div>
            </div>
        </div>
        <div>
            <h2 class="font-bold mb-1">Certificado de Practicas</h2>
            <div class="my-4 grid grid-cols-2 gap-4 px-2">            
                <div>
                    <label for="file_certificado" class="col-span-2">Adjunte Certificado (600 horas)
                    <input type="file" name="file_certificado" id="file_certificado" class="w-full" accept=".pdf">
                    @error('file_certificado')
                        <span>
                            <strong class="text-red-500">{{$message}}</strong>
                        </span>
                    @enderror                
                    </label>
                </div>
                <div class="grid justify-items-end  my-2">
                    <!-- Button Modal -->
                    <a id="btnCertificado" class="cursor-pointer bg-gray-200 hover:bg-gray-300 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
                        <i class="fas fa-eye"></i>
                        <span class="ml-2">Preview</span>
                    </a>
                </div>
            </div>
        </div>

        
        <input type="submit" value="Enviar" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded w-full mt-2 cursor-pointer">
    </form>
    {{-- Fin Informe Final --}}

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

    <div id="modalCertificado" class="modal">

        <!-- Modal content -->
        <div class="modal-content" overflow: scroll;>
            <span class="close" id="closeCertificado">&times;</span>
            <embed id="previewCertificado" type="application/pdf" style="height: 92%; width: 100%;">
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
                    
            let file_Plan = document.querySelector('#file_informefinal');  
            let btnPlan = document.querySelector('#btnInformefinal')    
            let modal_Plan = document.querySelector("#modalPlan");
            let span_Plan = document.querySelector("#closePlan");             
            let contenidoModal_Plan = document.querySelector('#previewPlan');             

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
            let btnCertificado = document.querySelector('#btnCertificado')                    
            let file_Certificado = document.querySelector('#file_certificado');      
            let modal_Certificado = document.querySelector("#modalCertificado");
            let span_Certificado = document.querySelector("#closeCertificado");             
            let contenidoModal_Certificado = document.querySelector('#previewCertificado'); 

            span_Certificado.onclick = function() {
                modal_Certificado.style.display = "none";
            }
            window.onclick = ()=> {
                if (event.target == modal_Certificado) {
                    modal_Certificado.style.display = "none";
                }
            }
                        
            file_Certificado.addEventListener('change', () => {
                let pdffFileURL = URL.createObjectURL(file_Certificado.files[0]) + "#toolbar=0";
                contenidoModal_Certificado.setAttribute('src', pdffFileURL);
                btnCertificado.classList.remove('bg-gray-300','text-gray-800','hover:bg-gray-400');
                btnCertificado.classList.add('bg-green-300','hover:bg-green-400');
            });

            btnCertificado.onclick = ()=>{
                        
                if(file_Certificado.files[0]){                
                    modal_Certificado.style.display = "block";
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