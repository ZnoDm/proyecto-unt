<x-alumno-layout>
    @php
        $status = $tesis->tesis_status;
        $time=strtotime($tesis->sustentacion);
    @endphp
    {{-- Informe Final --}}
    @if($status == 4 or $status ==5)
        <h2 class="text-xl font-bold mt-4 text-center">INFORME EN REVISION</h2>
    @else
        @if ($status ==6)
            <h2 class="text-xl font-bold mt-4 text-center">SU TESIS SE ENCUENTRA EN REVISION POR EL JURADO</h2>
            <p class="font-bold text-center">Lapso 15 días</p>
                <div>
                    @foreach ($tesis->docentes as $jurado)                
                    <div class="grid grid-cols-4 gap-4 my-3">                 
                        <h6 class="my-3">JURADO {{$loop->iteration}}</h6>
                        <div class="col-span-3">{{$jurado}}</div>                             
                    </div>
                    <div class="my-5">
                        Observaciones
                    </div>
                    @endforeach
                </div>                
        @else
            <h2 class="text-xl font-bold mt-4">INFORME FINAL</h2>
            <form action="{{route('tesis.informefinal',$tesis->id)}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid grid-cols-4">
                    <div class="col-span-2">
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
                                <label class="col-span-3" for="file_voucher">Adjunte Recibo:
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
                    <div class=""></div>
                    <div class="text-center">
                        <h6 class="font-bold">FECHA LIMITE</h6>
                        <div class="rounded-t overflow-hidden text-center col-span-1">
                            <div class="bg-blue-600 text-white py-1">
                                {{date("F", $time)}}
                            </div>
                            <div class="pt-1 border-l border-r border-white bg-white">
                            <span class="text-3xl font-bold leading-tight">
                                {{date("d", $time)}}
                            </span>
                            </div>
                            <div class="border-l border-r border-b rounded-b-lg text-center border-white bg-white -pt-2 -mb-1">
                            <span class="text-sm">
                                {{date("D", $time)}}
                            </span>
                            </div>
                            <div class="pb-2 border-l border-r border-b rounded-b-lg text-center border-white bg-white">
                            <span class="text-xs leading-normal">
                                Antes de 12:00 pm
                            </span>
                            </div>
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
                
                <input type="submit" value="Enviar" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded w-full mt-2 cursor-pointer">
            </form>
        @endif  

    @endif
    {{-- Fin Informe Final --}}


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