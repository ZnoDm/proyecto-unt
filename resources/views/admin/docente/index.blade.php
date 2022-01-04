@extends('adminlte::page')

@section('title', 'Docente')

@section('content_header')
    <h1>Bandeja de Entrada</h1>
@stop

@section('content')
    @livewire('admin.docente.tesis')
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
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.8.2/dist/alpine.min.js" defer></script>
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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        Livewire.on('DocenteAcepta', (jurado) => {
            console.log(jurado);
            Swal.fire({
                    title: 'Esta seguro?',
                    text: "Esta apunto de aceptar la tesis!",
                    icon: 'warning',
                    showCancelButton: true,
                    cancelButtonText: 'Cancelar',
                    confirmButtonColor: '#2ECC71',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'De Acuerdo! '
                }).then((result) => {
                if (result.isConfirmed) {
                    Livewire.emitTo('admin.docente.tesis','aceptar',jurado);
                }
            })
        });
    </script>
@endsection
