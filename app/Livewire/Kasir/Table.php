<?php

namespace App\Livewire\Kasir;

use Livewire\Component;
use App\Models\Cart;
use App\Models\Voucher;
use App\Models\Transaksi;
use Carbon\Carbon;

class Table extends Component
{

    public  $harga,$qty;
    public $barang,$voucher;
    protected $listeners = ['store'=>'render'];

    public function render()
    {
        return view('livewire.kasir.table',[
            'datas'=>Cart::where('kode_transaksi',null)->latest()->get(),
            'totalHarga' => Cart::where('kode_transaksi',null)->sum('total')
        ]);
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
    }

    public function bayar(){
        $totalHarga = Cart::where('kode_transaksi',null)->sum('total');
        $total = Cart::where('kode_transaksi',null)->sum('total');
        $exp = Carbon::now()->addMonth(3)->toDateString();
        $now = Carbon::now()->toDateString();
        $code = $this->codeUnique();

        // $voucher = Voucher::where('kode',$this->voucher)->whereDate('exp','>=',$now)->first();
        if($this->voucher){

            $voucher = Voucher::where('kode',$this->voucher)->first();

            if($voucher){
                if($voucher->status =='Telah Digunakan'){
                    // dd('Telah Digunakan');

                    return session()->flash('error','Voucher Telah Digunakan');
                }
                if(Carbon::parse($voucher->exp)->gt(Carbon::parse($now))){
                    $totalHarga=Cart::where('kode_transaksi',null)->sum('total') -10000;
                    Voucher::where('kode',$this->voucher)->update([
                        'status'=>'Telah Digunakan'
                    ]);
                }else{
                    return session()->flash('error','Voucher Telah Expired');
                }
            }
            return session()->flash('error','Voucher Tidak Ditemukan');
        }


        Transaksi::create([
            'total_harga'=>$totalHarga,
        ]);

        $kTransaksi = Transaksi::latest()->first();

        Cart::where('kode_transaksi',null)->update([
            'kode_transaksi'=>$kTransaksi->kode_transaksi
        ]);

        if($total>=1000000){
            Voucher::create([
                'kode'=>$code,
                'kode_transaksi'=>$kTransaksi->kode_transaksi,
                'exp'=>$exp,
                'status'=>'Belum Digunakan'
            ]);
        }

         session()->flash('success','Transaksi Berhasil');
         session()->flash('kode',$kTransaksi->kode_transaksi);

        ;

    }

    public function delete($id){
        Cart::find($id)->delete();
    }


    private function codeUnique()
    {
        $uniqueCode = substr(md5(uniqid(mt_rand(), true)), 0, 8);
        return strtoupper($uniqueCode);
    }


}
