@component('mail::message')
**Estimado, {{$alumno->alumno_apellido.' '.$alumno->alumno_nombre}}**  

{{$mensaje}}

    
**Detalle de Solicitud**  
Titulo Tesis: {{$tesis->tesis_titulo}}  
Asesor: {{ucwords(strtolower($tesis->docente->docente_nombre))}} - {{$tesis->docente->docente_email}}  

> Recomendaciones:  
> Ponerse en contacto con su docente asesor.  
> Ponerse en contacto con sus jurados asignados.    

@component('mail::button', ['url' => 'http://proyecto-si.test:8080/'])
IR AL SISTEMA
@endcomponent

Gracias,<br>
{{ config('app.name') }}
@endcomponent


