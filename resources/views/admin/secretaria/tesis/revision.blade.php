@extends('adminlte::page')
@section('title', 'tesiss Pendientes')
@section('content_header')
        
    <hr class="mt-3">
@stop

@section('content')

@if ($tesis->tesis_status ==1)
  @livewire('admin.secretaria.tesis-solicitud', ['alumno' => $alumno,'tesis' => $tesis])
@else
  @livewire('admin.secretaria.tesis-informe-final', ['alumno' => $alumno,'tesis' => $tesis])
@endif

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Mandar Correcciones</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="p-2">{{-- 
            {{route('admin.tesis.denegar',['id'=>$tesis->id,'alumno' =>$tesis->alumno_codigo,'estado' =>$estado])}} --}}
            <form action="" method="post">
                @csrf
                <label for="descripcion">Observaciones:</label>
                <textarea name="descripcion" id="descripcion" cols="30" rows="10" class="mb-2"></textarea>
                @error('descripcion')
                <span>
                    <strong class="text-red-500">{{$message}}</strong>
                </span>
                @enderror
                <input type="submit" value="Enviar" class="btn btn-success w-full btn-block mt-2">
            </form>
        </div>
        
      </div>
    </div>
</div>

@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">    
@stop

@section('js')
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    Livewire.on('enviarDireccion', tesisId => {
          Swal.fire({
                  title: 'Are you sure?',
                  text: "You won't be able to revert this!",
                  icon: 'warning',
                  showCancelButton: true,
                  confirmButtonColor: '#3085d6',
                  cancelButtonColor: '#d33',
                  confirmButtonText: 'Yes, delete it! '+tesisId
              }).then((result) => {
              if (result.isConfirmed) {
                  Livewire.emitTo('admin.secretaria.tesis-solicitud','enviar',tesisId);
                  Swal.fire(
                  'Deleted!',
                  'Your file has been deleted.',
                  'success'
                  )
              }
              })
      });
  </script>

<script>
  Livewire.on('enviarDireccionIF', tesisId => {
        Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it! '+tesisId
            }).then((result) => {
            if (result.isConfirmed) {
                Livewire.emitTo('admin.secretaria.tesis-informe-final','enviar',tesisId);
                Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
                )
            }
            })
    });
</script>
@stop