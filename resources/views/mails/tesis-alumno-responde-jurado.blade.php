@component('mail::message')
**Estimado, {{$jurado->docente->docente_apellido.' '.$jurado->docente->docente_nombre}}**   

El alumno {{$tesis->alumno->alumno_apellido.' '.$tesis->alumno->alumno_nombre}} ha respondido su observacion.   

**Respuesta:**   

{{$mensaje}}  

---------------------------------------   

> Recomendaciones:  
> Ponerse en contacto con su alumno asignado.  

@component('mail::button', ['url' => 'http://proyecto-si.test:8080/'])
IR AL SISTEMA
@endcomponent

Gracias,<br>
{{ config('app.name') }}
@endcomponent
