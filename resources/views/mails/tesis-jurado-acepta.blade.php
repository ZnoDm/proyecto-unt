@component('mail::message')
**En buena hora!, {{$tesis->alumno->alumno_apellido.' '.$tesis->alumno->alumno_nombre}}** 


El jurado  {{$jurado->docente->docente_apellido.' '.$jurado->docente->docente_nombre}} ha dado por culminado la revision de su tesis.   


> Recomendaciones:  
> Espere a la confirmacion de todos sus jurados.  

@component('mail::button', ['url' => 'http://proyecto-si.test:8080/'])
IR AL SISTEMA
@endcomponent


Gracias,<br>{{ config('app.name') }}
@endcomponent
