@component('mail::message')
**Estimado, {{$alumno->alumno_apellido.' '.$alumno->alumno_nombre}}**  

{{$mensaje}}
  

> Recomendaciones:  
> Esta apto para realizar su tramite de tesis.    

@component('mail::button', ['url' => 'http://proyecto-si.test:8080/'])
IR AL SISTEMA
@endcomponent

Gracias,<br>
{{ config('app.name') }}
@endcomponent
