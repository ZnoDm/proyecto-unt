@component('mail::message')
**Estimado, {{$docente->docente_apellido.' '.$docente->docente_nombre}}**  

{{$mensaje}}
  
  
**Detalle de Practica**  
Alumno: {{ucwords(strtolower($alumno->alumno_apellido)).' '.ucwords(strtolower($alumno->alumno_nombre))}} - {{$alumno->alumno_email}}  
Empresa: {{$practica->empresa->empresa_razonsocial}} 

> Recomendaciones:  
> Ponerse en contacto con su alumno asignado.  

@component('mail::button', ['url' => 'http://proyecto-si.test:8080/'])
IR AL SISTEMA
@endcomponent

Gracias,<br>
{{ config('app.name') }}
@endcomponent
