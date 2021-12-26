<x-alumno-layout>    
    @if ($observacion != '' and ($practica->practica_status==10 or $practica->practica_status==11))
        <div role="alert">
            <div class="bg-red-500 text-white font-bold rounded-t px-4 py-2">
            Observaciones
            </div>
            <div class="border border-t-0 border-red-400 rounded-b bg-red-100 px-4 py-3 text-red-700">
            <p>{{$observacion->po_detalle}}</p>
            </div>
        </div>
        <hr class="my-3">
    @endif
    {{-- Informe Final --}}
    <h2 class="text-xl font-bold mt-4">INFORME FINAL</h2>
    <form action="{{route('tramite.practica.informefinal.update',$practica)}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('put')
        @if ($practica->practica_status !=11)
            <div>
                <h2 class="font-bold mb-1">Voucher </h2>

                <div class="mb-2 grid grid-cols-2 gap-4 px-2">
                    <div class="col-span-2">
                        <label for="nro">Número de Operacion:
                            <input type="text" name="nro" id="nro" class="w-full" value="{{old('nro',$practica->vouchers->last()->voucher_nro)}}"">
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
                        <a id="btnVoucher" class="cursor-pointer bg-green-200 hover:bg-green-300 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
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
                        <a id="btnFut" class="cursor-pointer bg-green-200 hover:bg-green-300 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
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
                        <a id="btnCertificado" class="cursor-pointer bg-green-200 hover:bg-green-300 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
                            <i class="fas fa-eye"></i>
                            <span class="ml-2">Preview</span>
                        </a>
                    </div>
                </div>
            </div>
        @endif
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
                    <a id="btnInformefinal" class="cursor-pointer bg-green-200 hover:bg-green-300 text-gray-800 font-bold py-2 px-4 rounded inline-flex items-center">
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
                    <div class="mt-2"><img id="previewVoucher" src="{{$practica->vouchers->last()->voucher_url}}" alt="">
                          </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div id="modalFUT" class="modal">
        <div class="modal-content" overflow: scroll;>
            <span class="close" id="closeFUT">&times;</span>
            <embed id="previewFUT" src="{{$practica->futs->last()->fut_url}}" type="application/pdf" style="height: 92%; width: 100%;">
        </div>
    </div>

    <!-- Modal -->
    <div id="modalPlan" class="modal">
        <div class="modal-content" overflow: scroll;>
            <span class="close" id="closePlan">&times;</span>
            <embed id="previewPlan" src="{{$practica->practica_file_informe_final_url}}" type="application/pdf" style="height: 92%; width: 100%;">
        </div>
    </div>

    <div id="modalCertificado"  class="modal">
        <div class="modal-content" overflow: scroll;>
            <span class="close" id="closeCertificado">&times;</span>
            <embed id="previewCertificado" src="{{$practica->practica_certificado_url}}" type="application/pdf" style="height: 92%; width: 100%;">
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
            });

            btnPlan.onclick = ()=>{             
                modal_Plan.style.display = "block";
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
            });

            btnCertificado.onclick = ()=>{           
                    modal_Certificado.style.display = "block";
            }        
        </script>
    @endpush
    
</x-alumno-layout>