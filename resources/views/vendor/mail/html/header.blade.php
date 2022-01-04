<tr>
<td class="header">

@if (trim($slot) === 'ESCUELA DE INGENIERIA DE SISTEMAS - UNT')
<img src="{{asset('img/recursos/logo_unt.png')}}" class="logo" alt="UNT Logo">
<h1 style="text-align: center;">ESCUELA DE INGENIERIA DE SISTEMAS</h1>
@else
{{ $slot }}
@endif
</td>
</tr>
