<div>
    @if (session('info'))
    <div class="alert alert-success">{{session('info')}}</div>
    @endif

    <div class="card">
        <div class="card-header">
            <input wire:keydown="limpiar_page" wire:model="search" class="form-control w-100"
                placeholder="Escriba un nombre...">
        </div>
        @if ($vouchers->count())
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col"
                            role="button" wire:click="order('voucher_nro')">
                            NRO VOUCHER
                            @if ($sort == 'voucher_nro')
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
                            role="button" wire:click="order('voucher_url')">
                            VOUCHER URL
                            @if ($sort == 'voucher_url')
                                @if ($direction == 'asc')
                                    <i class="fas fa-sort-alpha-up-alt float-right mt-1"></i>
                                @else
                                    <i class="fas fa-sort-alpha-down-alt float-right mt-1"></i>
                                @endif
                            @else
                                <i class="fas fa-sort float-right mt-1"></i>
                            @endif
                        </th>
                        <th>ACCIÓN</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($vouchers as $voucher)
                    <tr>
                        <td>{{$voucher->voucher_nro}}</td>
                        <td>{{$voucher->voucher_url}}</td>
                        <td width="50px">
                            <a href="{{-- {{route('admin.docente.show',$docente)}} --}}" class="btn btn-success">Preview</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="card-footer">
            {{$vouchers->links()}}
        </div>
        @else
        <div class="card-body"><strong>No hay registros</strong></div>
        @endif
    </div>
</div>