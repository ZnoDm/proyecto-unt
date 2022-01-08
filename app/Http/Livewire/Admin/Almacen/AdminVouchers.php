<?php

namespace App\Http\Livewire\Admin\Almacen;

use App\Models\Voucher;
use Livewire\Component;
use Livewire\WithPagination;

class AdminVouchers extends Component
{
    use WithPagination;
    protected $paginationTheme = "bootstrap";
    public $search;
    public $sort = 'id';
    public $direction = 'asc';

    public function render()
    {
        $vouchers = Voucher::where('voucher_nro', 'like', $this->search.'%')
                            ->orderBy($this->sort, $this->direction)
                            ->paginate(5);

        return view('livewire.admin.almacen.admin-vouchers', compact('vouchers'));
    }

    public function limpiar_page()
    {
        $this->reset('page');
    }

    public function order($sort)
    {
        if ($this->sort == $sort) {
            if ($this->direction == 'desc') {
                $this->direction = 'asc';
            } else {
                $this->direction = 'desc';
            }
        } else {
            $this->sort = $sort;
            $this->direction = 'asc';
        }
    }
}
