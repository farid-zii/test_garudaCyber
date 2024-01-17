<?php

namespace App\Livewire\Kasir;

use Livewire\Component;
use App\Models\Barang;
use App\Models\Cart;
use Illuminate\Http\Request;

class Create extends Component
{

    public  $harga,$qty;
    public $barang;

    public function render()
    {
        return view('livewire.kasir.create');
    }

    public function store(){


        Cart::create([
            'nama_barang'=>$this->barang,
            'harga'=>$this->harga,
            'qty'=>$this->qty,
            'total'=>$this->qty * $this->harga,
        ]);

        $this->barang=null;
        $this->harga=null;
        $this->qty=null;

        $this->emit('store');
    }
}
