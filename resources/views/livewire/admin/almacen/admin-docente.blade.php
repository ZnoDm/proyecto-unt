<div>
    @if (session('info'))
    <div class="alert alert-success">{{session('info')}}</div>
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
                            Asignado
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
                        <th class="text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($docentes as $docente)
                    <tr>
                        <td>{{$docente->id}}</td>
                        <td>{{$docente->docente_nombre}}</td>
                        <td class="text-center">
                            @switch($docente->docente_status)
                                @case(1)
                                    PRACTICAS
                                    @break
                                @case(2)
                                    TESIS
                                    @break
                                @case(3)
                                    PRACTICAS Y TESIS
                                    @break
                                @default
                                    NO ASIGNADO
                            @endswitch
                        </td>
                        <td width="10px" class="text-center">
                            <a href="" class="btn btn-secondary btn-sm"><i class="fas fa-cog"></i></a>
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