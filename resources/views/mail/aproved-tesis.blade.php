<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <style>
        .t-footer{
            color: #E6AD09;
        }
        .t-footer>p,.t-footer>span{
            color: #FFFFFF;
        }
        .t-footer>span>i{
            color: #E6AD09;
        }
    </style>
</head>
<body style="background: #12377B;">
    <div class="container">
        <div class="row" style="background:#FFFFFF">
            <div class="col text-center py-4">
                <img src="{{asset('img/logo_unt.png')}}" alt="Logo" style="height: 170px;">
            </div>
        </div>
        <div class="row" style="background: #0add50;" >
            <div class="col py-4">
                <h3 class="text-center" style="color: #FFFFFF;">APROBADA</h3>
            </div>
        </div>

        <div class="row" style="background:#FFFFFF;" >
            <div class="col p-5 fs-5">
                <p>Estimado estudiante, <span class="fw-bold"> {{$alumno->apellido.' '.$alumno->nombre}} </span> </p>
                <p>{{$mensaje}}</p>
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col" class="text-center">JURADO</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($jurados as $jurado)
                                <tr>
                                    <td>{{$jurado->nombre}}</td>
                                </tr>      
                            @endforeach
                          
                        </tbody>
                      </table>
            <br>
                <p>Saludos Cordiales, <br>
                    Escuela de Ingenier??a de Sistemas.
                    </p>
            </div>
        </div>
        
        <div class="row p-5" style="background:#1B1811">
                <div class="col-3 t-footer">
                    <h5>UBICACI??N</h5>
                    <div class="mb-3" style="border-bottom-style: solid; border-bottom-width: 3px; width: 40px;"></div>

                    <span>Campus Universitario </span> <br>
                    <span>Av. Juan Pablo II S/N </span> <br>
                    <span>Trujillo - Per?? </span> <br>
                    <span>Filiales: </span> <br>
                    <span>Sede Huamachuco </span> <br>
                    <span>Sede Valle Jequetepeque </span>
                </div>
                <div class="col-3 t-footer">
                    <h5>CONTACTO</h5>
                    <div class="mb-3" style="border-bottom-style: solid; border-bottom-width: 3px; width: 40px;"></div>

                    <span><i class="bi bi-telephone-fill"></i> &nbsp; (044) 209020  </span> <br>
                    <span><i class="bi bi-envelope"></i> &nbsp; tdsgunt@unitru.edu.pe  </span> <br>
                    <span><i class="bi bi-globe"></i> &nbsp; https://www.unitru.edu.pe/ </span>

                </div>
                <div class="col-3 t-footer">
                    <h5>SOBRE ESTE PORTAL</h5>
                    <div class="mb-3" style="border-bottom-style: solid; border-bottom-width: 3px; width: 40px;"></div>

                    <span> Mapa de Sitio </span>  <br>
                    <span> T??rminos de uso </span> <br>
                    <span> Pol??ticas de Privacidad </span>
                </div>
                <div class="col-3 t-footer">
                    <h5>S??GUENOS EN: </h5>
                    <div class="mb-3" style="border-bottom-style: solid; border-bottom-width: 3px; width: 40px;"></div>
                    <div class="d-flex" style="color: #FFFFFF!important;">
                        <h3 class="px-2"> <i class="bi bi-facebook"></i></h3>                     
                        <h3 class="px-2"> <i class="bi bi-instagram"></i></h3> 
                        <h3 class="px-2"> <i class="bi bi-twitter"></i></h3> 
                        <h3 class="px-2"> <i class="bi bi-linkedin"></i></h3> 
                    </div>

                </div>
        </div>  
        <div class="row" style="background: #222222;color: #FFFFFF;">
            <div class="col text-center py-3">?? 2021 - Facultad de Ingenier??a. Todos los derechos reservados.</div>
        </div>
    </div>
</body>
</html>