<div>
    @if (session('info'))
    <div class="alert alert-success">{{session('info')}}</div>
    @endif

    <div class="card">
        <div class="card-header">
            <input wire:keydown="limpiar_page" wire:model="search" class="form-control w-100"
                placeholder="Escriba un nombre...">
        </div>
        @if ($empresas->count())
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col"
                            role="button" wire:click="order('empresa_ruc')">
                            RUC
                            @if ($sort == 'empresa_ruc')
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
                            role="button" wire:click="order('empresa_razonsocial')">
                            RAZÓN SOCIAL
                            @if ($sort == 'empresa_razonsocial')
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
                            role="button" wire:click="order('empresa_representante')">
                            REPRESENTANTE
                            @if ($sort == 'empresa_representante')
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
                            role="button" wire:click="order('empresa_supervisor')">
                            SUPERVISOR
                            @if ($sort == 'empresa_supervisor')
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
                            role="button" wire:click="order('empresa_telefono')">
                            TELÉFONO
                            @if ($sort == 'empresa_telefono')
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
                    @foreach ($empresas as $empresa)
                    <tr>
                        <td>{{$empresa->empresa_ruc}}</td>
                        <td>{{$empresa->empresa_razonsocial}}</td>
                        <td>{{$empresa->empresa_representante}}</td>
                        <td>{{$empresa->empresa_supervisor}}</td>
                        <td>{{$empresa->empresa_telefono}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{$empresas->links()}}
        </div>
        @else
        <div class="card-body"><strong>No hay registros</strong></div>
        @endif
    </div>
</div>
