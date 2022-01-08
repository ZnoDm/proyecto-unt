@component('mail::message')
**Estimado, {{$alumno->alumno_apellido.' '.$alumno->alumno_nombre}}**  

Su solicitud de {{$tipo}} ha sido denegada por inconsistencia en los datos brindatos.  

**Observacion**  
{{$mensaje}}  
  
@if ($tipo!="Tesis")
**Tesis**  
Titulo: {{$tesis->tesis_titulo}}  
Asesor: {{ucwords(strtolower($tesis->docente->docente_nombre))}} - {{$tesis->docente->docente_email}}  
@endif  

> Recomendaciones:  
@if ($tipo!="Tesis")    
> Ponerse en contacto con su docente asesor.    
@endif
> Verificar los datos brindados.   
> Volver a subir los datos necesarios.   

@component('mail::button', ['url' => 'http://proyecto-si.test:8080/'])
IR AL SISTEMA
@endcomponent

Gracias,<br>
{{ config('app.name') }}
@endcomponent