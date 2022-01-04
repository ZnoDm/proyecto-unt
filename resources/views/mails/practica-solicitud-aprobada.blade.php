@component('mail::message')
**Estimado, {{$alumno->alumno_apellido.' '.$alumno->alumno_nombre}}**  

{{$mensaje}}
  
  
**Detalle de Solicitud**  
Empresa: {{$practica->empresa->empresa_razonsocial}}  
Asesor: {{ucwords(strtolower($practica->docente->docente_nombre))}} - {{$practica->docente->docente_email}}  

> Recomendaciones:  
> Ponerse en contacto con su docente asesor.  
> Presentar su informe final en las fechas establecidas.  

@component('mail::button', ['url' => 'http://proyecto-si.test:8080/'])
IR AL SISTEMA
@endcomponent

Gracias,<br>
{{ config('app.name') }}
@endcomponent
