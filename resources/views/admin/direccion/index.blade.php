@extends('adminlte::page')

@section('title', 'Dashboard')

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
    {{--Recojer practica ID--}}
    <script>
        let tipo;
        let practicaId,practicaEstatus;
        function recogerPracticaId(sendId,sendEstatus){           
            practicaId = sendId;
            practicaEstatus = sendEstatus;  
            tipo='PRACTICA';       
            console.log(practicaId+' - estado: '+ practicaEstatus+tipo);  
        }
    </script>
    {{--Recojer tesis ID--}}
    <script>
        let tesisId,tesisEstatus;
        function recogerTesisId(sendId,sendEstatus){           
            tesisId = sendId;
            tesisEstatus = sendEstatus;
            tipo='TESIS';         
            console.log(tesisId+' - estado: '+ tesisEstatus+tipo);  
        }
    </script>
    {{--Denegar para ambos--}}
    <script>
        Livewire.on('CargarMensaje', () => {            
            var mensajito =document.querySelector('textarea[id="mensajito"]').value;
            if(tipo=='TESIS' ){
                Livewire.emitTo('admin.direccion.solicitud','denegarTesis',tesisId,mensajito,tesisEstatus);
            }else{                
                Livewire.emitTo('admin.direccion.solicitud','denegarPractica',practicaId,mensajito,practicaEstatus);
            }          
        });
    </script>
    {{--Modal Preview ambos--}}
    <script>
        let modalP = document.querySelector("#modalPreview");
        let spanP = document.querySelector("#closePreview");     
        spanP.onclick = function() {
                modalP.style.display = "none";
        }
        window.onclick = ()=> {
            if (event.target == modalP) {
                modalP.style.display = "none";
            }
        }
        Livewire.on('CargarModal',(src,tipo) =>{    
            console.log(tipo);                   
            console.log(src);
            document.querySelector('#preview').setAttribute('src', src);
            document.querySelector("#modalPreview").style.display = "block";  
        });      
    </script>
 
    {{--Aprobar practicas--}}
    <script>
        Livewire.on('AprobarPracticaDireccion', (practicaId,estatus) => {
            console.log(practicaId+' - estado: '+estatus + 'PRACTICA');
            Swal.fire({
                    title: 'Esta seguro?',
                    text: "Esta apunto de aprobar esta solicitud de practica!",
                    icon: 'warning',
                    showCancelButton: true,
                    cancelButtonText: 'Cancelar',
                    confirmButtonColor: '#2ECC71',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'De Acuerdo! '
                }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emitTo('admin.direccion.solicitud','aprobarPractica',practicaId,estatus);
                }
                })
        });
    </script>
    {{--TESIS--}}     
    {{--Aprobar tesis--}}
    <script>        
        Livewire.on('AprobarTesisDireccion', (tesisId,estatus) => {
            console.log(tesisId+' - estado:'+estatus + 'TESIS - Array Docentes ID:'+ temporal);
            
            Swal.fire({
                    title: 'Esta seguro?',
                    text: "Esta apunto de aprobar esta solicitud de tesis!",
                    icon: 'warning',
                    showCancelButton: true,
                    cancelButtonText: 'Cancelar',
                    confirmButtonColor: '#2ECC71',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'De Acuerdo! '
                }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emitTo('admin.direccion.solicitud','aprobarTesis',tesisId,estatus,temporal,puestos_temporal);
                }
                })
        });
    </script>
    {{--Aprobar tesis IF--}}
    <script type="text/javascript">
        
        var indice=0;
        let puestos_temporal=[];
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
                        fila    =   '<tr id="fila'+indice+'"><td>'
                                    +'COD-'+docente[0]+'</td><td>'+
                                    docente[1]+
                                    '</td><td><select class="form-control w-100" name="puesto_'+indice+'" id="puesto_'+indice+'" onchange="puesto('+indice+');"><option value="0" disabled selected>Selecciona</option><option value="PRESIDENTE">PRESIDENTE</option><option value="SECRETARIO">SECRETARIO</option><option value="VOCAL">VOCAL</option></select>'+
                                    '</td><td class="text-center"><a href="#" onclick="quitar('+indice+')" style="color:red;"><i class="far fa-trash-alt"></i></a></td></tr>';
                        $('#detalle').append(fila);
                        indice++;
                        console.log(temporal);
                        
                    }
                    
                }
            }
            if(suma_jurados==3)
                document.getElementById('submitIF').disabled=false;
            console.log('SUMA JURADOS: '+suma_jurados);
        }
        function quitar(item)
        {
            puestos_temporal.splice(item, 1);
            temporal.splice(item, 1);
            console.log(temporal);
            $('#fila'+item).remove();
            indice--;
            suma_jurados = suma_jurados - 1;
            if(suma_jurados < 3){
                document.getElementById('submitIF').disabled=true;
            }
            console.log('SUMA JURADOS: '+ suma_jurados);
        }
        function puesto(indice)
        {
            console.log(indice);            
            let elemento = document.getElementById('puesto_'+indice).value;
            console.log(elemento);
            
            if(puestos_temporal.find(element => element == elemento))
                {
                    alert("No puede darle ese puesto, ya existe");
                    document.getElementById('puesto_'+indice).selectedIndex ="0";
                }
            else
                {
                puestos_temporal[indice] = elemento;
                }
            console.log('PUESTOS: '+ puestos_temporal);
            
        }
        Livewire.on('AprobarTesisDireccionIF', () => {
            if(puestos_temporal.length >=3){                
                console.log(tesisId+' - estado:'+tesisEstatus  + 'TESIS - Array Docentes ID:'+ temporal);
                Livewire.emitTo('admin.direccion.solicitud','aprobarTesis',tesisId,tesisEstatus ,temporal,puestos_temporal);     
            } else
            {
                alert('Agrega puestos');
            }      
        });

    </script>
    
@stop
