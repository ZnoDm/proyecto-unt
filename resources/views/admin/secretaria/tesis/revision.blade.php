@extends('adminlte::page')
@section('title', 'tesiss Pendientes')
@section('content_header')
        
    <hr class="mt-3">
@stop

@section('content')

@php
    if(empty($observacion)){
      $observacion_test ='';
    }else {
      $observacion_test =$observacion->po_detalle;
    }
@endphp

@if ($tesis->tesis_status ==1)
  @livewire('admin.secretaria.tesis-solicitud', ['alumno' => $alumno,'tesis' => $tesis,'observacion'=>$observacion_test])
@else
  @livewire('admin.secretaria.tesis-informe-final', ['alumno' => $alumno,'tesis' => $tesis, 'observacion' => $observacion_test])
@endif

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
  {{--Modales FUT--}}
  <script>          
    let modal = document.querySelector("#modalFUT");
    let span = document.querySelector("#closeFUT");             
    let boton = document.querySelector('#btnFUT');

    span.onclick = function() {
        modal.style.display = "none";
    }
    window.onclick = ()=> {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

    boton.onclick = ()=>{                    
            modal.style.display = "block";
    }        
  </script>
  {{--Modales Tesis--}}
  <script>
                
    let modalP = document.querySelector("#modalTesis");
    let spanP = document.querySelector("#closeTesis");             
    let botonP = document.querySelector('#btnTesis');

    spanP.onclick = function() {
        modalP.style.display = "none";
    }
    window.onclick = ()=> {
        if (event.target == modalP) {
            modalP.style.display = "none";
        }
    }

    botonP.onclick = ()=>{                    
       modalP.style.display = "block";
    }        
  </script>
  {{--SweetAlert--}}
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  {{--Secretaria aprueba tesis--}}
  <script>
    Livewire.on('enviarDireccion', tesisId => {
          Swal.fire({
                  title: 'Esta seguro?',
                  text: "Esta apunto de enviar la tesis al director de escuela!",
                  icon: 'warning',
                  showCancelButton: true,
                  cancelButtonText: 'Cancelar',
                  confirmButtonColor: '#2ECC71',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'De Acuerdo! '
              }).then((result) => {
              if (result.isConfirmed) {
                  Livewire.emitTo('admin.secretaria.tesis-solicitud','enviar',tesisId);
              }
              })
      });
  </script>
  {{--Secretaria aprueba tesis Informe Final--}}
  <script>
    Livewire.on('enviarDireccionIF', tesisId => {
          Swal.fire({
                  title: 'Esta seguro?',
                  text: "Esta apunto de enviar al director de escuela!",
                  icon: 'warning',
                  showCancelButton: true,
                  cancelButtonText: 'Cancelar',
                  confirmButtonColor: '#2ECC71',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'De Acuerdo! '
              }).then((result) => {
              if (result.isConfirmed) {
                  Livewire.emitTo('admin.secretaria.tesis-informe-final','enviar',tesisId);
              }
              })
      });
  </script>
  {{--Observacion Denegar tesis--}}
  <script>
    Livewire.on('CargarMensajeIF', tesisId => {
      var mensajito =document.querySelector('textarea[id="mensajito"]').value;
      console.log(mensajito+ ' -' +tesisId);
      
      Livewire.emitTo('admin.secretaria.tesis-informe-final','denegar',tesisId,mensajito);
    });
  </script>
  <script>
    Livewire.on('CargarMensaje', tesisId => {
      var mensajito =document.querySelector('textarea[id="mensajito"]').value;
      console.log(mensajito+ ' -' +tesisId);
      
      Livewire.emitTo('admin.secretaria.tesis-solicitud','denegar',tesisId,mensajito);
    });
  </script>
@stop