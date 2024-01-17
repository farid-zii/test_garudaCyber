<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\Voucher;
use App\Models\Cart;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function cetak($kode)
    {

        $voucher='-';
        $ada= Voucher::where('kode_transaksi',$kode)->first();
        if($ada){
            $voucher = $ada->kode;
        }

        return view('faktur',[
            'transaksi'=>Transaksi::where('kode_transaksi',$kode)->first(),
            'carts'=>Cart::where('kode_transaksi',$kode)->get(),
            'total'=>Cart::where('kode_transaksi',$kode)->sum('total'),
            'voucher'=>$voucher,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaksi $transaksi)
    {
        //
    }
}
