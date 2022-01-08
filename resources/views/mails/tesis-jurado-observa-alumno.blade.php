@component('mail::message')
**Estimado, {{$tesis->alumno->alumno_apellido.' '.$tesis->alumno->alumno_nombre}}**    

El jurado  {{$jurado->docente->docente_apellido.' '.$jurado->docente->docente_nombre}} ha observado su tesis      

**Observacion:**   

{{$mensaje}}  

---------------------------------------   

> Recomendaciones:  
> Ponerse en contacto con su asesor asignado.  

@component('mail::button', ['url' => 'http://proyecto-si.test:8080/'])
IR AL SISTEMA
@endcomponent


Gracias,<br>{{ config('app.name') }}
@endcomponent
