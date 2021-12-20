@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h3>SOLICITUDES RECIENTES</h3>
@stop

@section('content')
    @if (session('info'))
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
            {{session('info')}}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif
    @livewire('admin.direccion.solicitud')
@stop

@section('css')
    <style>      
        .modal1 {
            display: none;
            position: fixed; /* Stay in place */
            z-index: 99999; /* Sit on top */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
        }

        /* Modal Content/Box */
        .modal-content1 {
            background-color: #fefefe;
            margin: 20px 100px 10px 100px; 
            padding: 15px;
            border: 1px solid #888;
            border-radius: 10px;
            height: 95%;
        }

        /* The Close Button */
        .close1 {
        color: #aaa;
        float: right;
        font-size: 28px;
        font-weight: bold;
        }

        .close1:hover,
        .close1:focus {
        color: black;
        text-decoration: none;
        cursor: pointer;
        }
    </style> 
@stop


@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>    
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{--Modal--}}
    <script>
        let modalP = document.querySelector("#modalPractica");
        let spanP = document.querySelector("#closePractica");     
        spanP.onclick = function() {
                modalP.style.display = "none";
        }
        window.onclick = ()=> {
            if (event.target == modalP) {
                modalP.style.display = "none";
            }
        }
              
        Livewire.on('CargarModal',src =>{           
            console.log(src);
            
            document.querySelector('#preview').setAttribute('src', src);
            document.querySelector("#modalPractica").style.display = "block";  
        });      
    </script>
    
    {{--practicas--}}
    <script>
        Livewire.on('AprobarPracticaDireccion', (practicaId,estatus) => {
            Swal.fire({
                    title: 'Esta seguro?',
                    text: "Esta apunto de aprobar esta solicitud!",
                    icon: 'warning',
                    showCancelButton: true,
                    cancelButtonText: 'Cancelar',
                    confirmButtonColor: '#2ECC71',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'De Acuerdo! '
                }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emitTo('admin.direccion.solicitud','aprobarPractica',practicaId,estatus);
                    Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                    )
                }
                })
        });
    </script>
    {{--Denegar practica--}}
    <script>
        let practicaId,estatus;
        function recogerPracticaId(sendId,sendEstatus){           
            practicaId = sendId;
            estatus = sendEstatus;         
            console.log(practicaId+' - '+ estatus);  
        }

        Livewire.on('CargarMensaje', () => {          
            var mensajito =document.querySelector('textarea[id="mensajito"]').value;
            Livewire.emitTo('admin.direccion.solicitud','denegarPractica',practicaId,mensajito,estatus);
        });
    </script>
    {{--tesis--}}
    <script>        
        Livewire.on('AprobarTesisDireccion', (tesisId,estatus) => {
            Swal.fire({
                    title: 'Esta seguro?',
                    text: "Esta apunto de aprobar esta solicitud!",
                    icon: 'warning',
                    showCancelButton: true,
                    cancelButtonText: 'Cancelar',
                    confirmButtonColor: '#2ECC71',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'De Acuerdo! '
                }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emitTo('admin.direccion.solicitud','aprobarTesis',tesisId,estatus);
                    Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                    )
                }
                })
        });
    </script>
    <script>
        Livewire.on('AprobarTesisDireccionIF', (tesisId,estatus) => {
            Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it! '+ tesisId+ estatus+ temporal,
                }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emitTo('admin.direccion.solicitud','aprobarTesisIF',tesisId,estatus,temporal);
                    Swal.fire(
                    'Deleted!',
                    'Your file has been deleted.',
                    'success'
                    )
                }
                })
        });
    </script>
    <script type="text/javascript">
        var indice=0;
        let temporal=[];
        var suma_jurados=0;
        function agregar()
        {		
            docente=document.getElementById('docente_id').value.split('_');
            if(temporal.indexOf(docente[0])>-1){
                alert('Ya has asignado este jurado');
            }
            else{
                suma_jurados = suma_jurados + 1;
                if(suma_jurados>3){
                    suma_jurados = suma_jurados - 1;
                    alert('Solo se asignan 3 jurados');
                }else{
                    if(docente[1] ==undefined){
                        
                        suma_jurados = suma_jurados - 1;
                        alert('Seleccione un docente');
                    }
                    else{
                        temporal[indice] = docente[0];		
                    fila='<tr id="fila'+indice+'"><td><input wire:model="jurado" type="hidden" name="docente_ids[]" value="'+docente[0]+'">'+docente[0]+'</td><td>'+docente[1]+'</td><td><a href="#" onclick="quitar('+indice+')" style="color:red;"><i class="far fa-trash-alt"></i></a></td></tr>';
                    $('#detalle').append(fila);
                    indice++;
                    console.log(temporal);
                    }
                    
                }
            }
            console.log(suma_jurados);
        }
        function quitar(item)
        {
            
            temporal.splice(item, 1);
            console.log(temporal);
            $('#fila'+item).remove();
            indice--;
            suma_jurados = suma_jurados - 1;
            if(suma_jurados === 0){
                document.getElementById('submit').disabled=true;
            }
            console.log(suma_jurados);
        }
    </script>
@stop
