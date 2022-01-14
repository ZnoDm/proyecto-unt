<div>
    @if (session('info'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Éxito!</strong> {{session('info')}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    @endif

    <div class="card">
        <div class="card-header">
            <input wire:keydown="limpiar_page" wire:model="search" class="form-control w-100"
                placeholder="Escriba un nombre...">
        </div>
        @if ($docentes->count())
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col"
                            role="button" wire:click="order('id')">
                            Id
                            @if ($sort == 'id')
                                @if ($direction == 'asc')
                                    <i class="fas fa-sort-numeric-up-alt float-right mt-1"></i>
                                @else
                                    <i class="fas fa-sort-numeric-down-alt float-right mt-1"></i>
                                @endif
                            @else
                                <i class="fas fa-sort float-right mt-1"></i>
                            @endif
                        </th>
                        <th scope="col"
                            role="button" wire:click="order('docente_nombre')">
                            Apellidos y Nombres
                            @if ($sort == 'docente_nombre')
                                @if ($direction == 'asc')
                                    <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                @else
                                    <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                @endif
                            @else
                                <i class="fas fa-sort float-right mt-1"></i>
                            @endif
                        </th>
                        <th scope="col"
                            role="button" wire:click="order('docente_status')" class="text-center">
                            Asignado Asesor
                            @if ($sort == 'docente_status')
                                @if ($direction == 'asc')
                                    <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                @else
                                    <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                @endif
                            @else
                                <i class="fas fa-sort float-right mt-1"></i>
                            @endif
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($docentes as $docente)
                    <tr>
                        <td>{{$docente->id}}</td>
                        <td>{{$docente->docente_nombre}}</td>
                        <td class="text-center">
                            <label >
                                <input {{($docente->docente_status==1 or $docente->docente_status==3)?'checked':''}} type="checkbox" value="1" wire:change="assignAsesor({{$docente->id}},$event.target.value)">
                                PRACTICAS
                            </label>
                            <label >
                                <input {{($docente->docente_status==2 or $docente->docente_status==3)?'checked':''}} type="checkbox" value="2" wire:change="assignAsesor({{$docente->id}},$event.target.value)">
                                TESIS
                            </label>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{$docentes->links()}}
        </div>
        @else
        <div class="card-body"><strong>No hay registros</strong></div>
        @endif
    </div>
</div>