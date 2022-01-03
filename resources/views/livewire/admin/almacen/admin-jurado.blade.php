<div>
    @if (session('info'))
    <div class="alert alert-success">{{session('info')}}</div>
    @endif

    <div class="card">
        <div class="card-header">
            <select name="filtro" wire:model='filtro' class="form-control">
                <option selected disabled>Buscar por ...</option>
                <option value="d.docente_nombre">Nombre de Jurado</option>
                <option value="a.alumno_apellido">Apellido de Alumno</option>
                <option value="t.tesis_titulo">Titulo de Tesis</option>
                <option value="dt.docente_nombre">Asesor de Tesis</option>
            </select>
            <br>
            <input wire:keydown="limpiar_page" wire:model="search" class="form-control w-100"
                placeholder="Escriba un nombre...">
        </div>
        @if ($jurados->count())
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col"
                            role="button" wire:click="order('jurado')">
                            JURADO
                            @if ($sort == 'jurado')
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
                            role="button" wire:click="order('alumno_apellido')">
                            ALUMNO
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
                            role="button" wire:click="order('tesis_titulo')">
                            TITULO DE TESIS
                            @if ($sort == 'tesis_titulo')
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
                            role="button" wire:click="order('docente_nombre')">
                            ASESOR DE TESIS
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
                            role="button" wire:click="order('tesis_fechainicio')">
                            INICIO DE TESIS
                            @if ($sort == 'tesis_fechainicio')
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
                            role="button" wire:click="order('tesis_fechafin')">
                            FIN DE TESIS
                            @if ($sort == 'tesis_fechafin')
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
                        @foreach ($jurados as $jurado)
                        <tr>
                            <td>{{$jurado->jurado}}</td>
                            <td>{{$jurado->alumno_apellido,' ',$jurado->alumno_nombre}}</td>
                            <td>{{$jurado->tesis_titulo}}</td>
                            <td>{{$jurado->docente_nombre}}</td>
                            <td>{{$jurado->tesis_fechainicio}}</td>
                            <td>{{$jurado->tesis_fechafin}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="card-footer">
                {{$jurados->links()}}
            </div>
        @else
            <div class="card-body"><strong>No hay registros</strong></div>
        @endif
    </div>
</div>