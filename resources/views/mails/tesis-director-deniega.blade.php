@component('mail::message')
**Estimado, {{$alumno->alumno_apellido.' '.$alumno->alumno_nombre}}**  

Su {{$tipo}} ha sido denegada por no cumplir con los lineamiemientos de la Escuela de Ingenieria de Sistemas.   

**Observacion**  
{{$mensaje}}  
  
@if ($tipo!="solicitud de Tesis")
**Tesis**  
Titulo: {{$tesis->tesis_titulo}}  
Asesor: {{ucwords(strtolower($tesis->docente->docente_nombre))}} - {{$tesis->docente->docente_email}}  
@endif  

> Recomendaciones:  
@if ($tipo!="solicitud de Tesis")    
> Ponerse en contacto con su docente asesor.    
@endif
> Verificar su documento de {{$tipo}}.   
> Volver a subir documento de {{$tipo}}.     

@component('mail::button', ['url' => 'http://proyecto-si.test:8080/'])
IR AL SISTEMA
@endcomponent

Gracias,<br>
{{ config('app.name') }}
@endcomponent