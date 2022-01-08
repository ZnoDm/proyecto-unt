<div>
    <div class="card">
        <div class="card-header">
            <input wire:keydown="limpiar_page" wire:model="search" class="form-control w-100"
                placeholder="Escriba un nombre...">
        </div>
        @if ($alumnos->count())
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
                            role="button" wire:click="order('alumno_apellido')">
                            Apellidos
                            @if ($sort == 'alumno_apellido')
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
                            role="button" wire:click="order('alumno_nombre')">
                            Nombres
                            @if ($sort == 'alumno_nombre')
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
                            role="button" wire:click="order('alumno_email')">
                            Email
                            @if ($sort == 'alumno_email')
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
                            role="button" wire:click="order('alumno_telefono')">
                            Teléfono
                            @if ($sort == 'alumno_telefono')
                                @if ($direction == 'asc')
                                    <i class="fas fa-sort-numeric-up-alt float-right mt-1"></i>
                                @else
                                    <i class="fas fa-sort-numeric-down-alt float-right mt-1"></i>
                                @endif
                            @else
                                <i class="fas fa-sort float-right mt-1"></i>
                            @endif
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($alumnos as $alumno)
                    <tr>
                        <td>{{$alumno->id}}</td>
                        <td>{{$alumno->alumno_apellido}}</td>
                        <td>{{$alumno->alumno_nombre}}</td>
                        <td>{{$alumno->alumno_email}}</td>
                        <td>{{$alumno->alumno_telefono}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{$alumnos->links()}}
        </div>
        @else
        <div class="card-body"><strong>No hay registros</strong></div>
        @endif
    </div>
</div>