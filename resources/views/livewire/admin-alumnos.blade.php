<div>
    <div class="card">
        <div class="card-header">
            <input wire:keydown="limpiar_page" wire:model="search" class="form-control w-100" placeholder="Escriba un nombre...">
        </div>
        @if ($alumnos->count())
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Apellidos</th>
                            <th>Nombres</th>
                            <th>Email</th>
                            <th>Telefono</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($alumnos as $alumno)
                            <tr>
                                <td>{{$alumno->codigo}}</td>
                                <td>{{$alumno->apellido}}</td>
                                <td>{{$alumno->nombre}}</td>
                                <td>{{$alumno->email}}</td>
                                <td>{{$alumno->telefono}}</td>
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
