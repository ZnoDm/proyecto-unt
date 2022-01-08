@component('mail::message')
**Estimado, {{$alumno->alumno_apellido.' '.$alumno->alumno_nombre}}**  

Su solicitud de {{$tipo}} ha sido denegada por no inconsistencia en los datos brindatos.  

**Observacion**  
{{$mensaje}}  
  
@if ($tipo!="Plan de Practica")
**Practica**  
Empresa: {{$practica->empresa->empresa_razonsocial}}  
Asesor: {{ucwords(strtolower($practica->docente->docente_nombre))}} - {{$practica->docente->docente_email}}  
@endif  

> Recomendaciones:  
@if ($tipo!="Plan de Practica")    
> Ponerse en contacto con su docente asesor.
@endif
> Verificar su Voucher - FUT - Empresa.   
> Volver a subir su Voucher - FUT - Empresa.   

@component('mail::button', ['url' => 'http://proyecto-si.test:8080/'])
IR AL SISTEMA
@endcomponent

Gracias,<br>
{{ config('app.name') }}
@endcomponent