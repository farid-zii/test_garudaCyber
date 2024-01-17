<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Transaksi extends Model
{
    use HasFactory;

    protected $guarded=[];

    public static function boot(){
        parent::boot();
        static::creating(function ($transaksi){
            $transaksi->kode_transaksi = 'CZ'.'-'.str_pad(self::count()+1,4,'0',STR_PAD_LEFT);
        });
    }
}
