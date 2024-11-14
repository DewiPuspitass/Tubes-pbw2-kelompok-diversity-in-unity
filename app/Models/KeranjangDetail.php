<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeranjangDetail extends Model
{
    use HasFactory;

    protected $table = "detail_keranjang";
    protected $primaryKey = "id_pesanan";
    protected $fillable = [
        "id_keranjang",
        "id_menu",
        "catetan",
        "jumlah",
        "harga_akhir"
    ];
}
