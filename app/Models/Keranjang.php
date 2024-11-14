<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pembayaran;

class Keranjang extends Model
{
    use HasFactory;

    protected $table = "keranjang";
    protected $primaryKey = "id_keranjang";

    protected $fillable = [
        "nama_pembeli",
        "no_meja", 
        "total_harga", 
        "tanggal_pesan", 
        "id_metode_pembayaran", 
        "status_pemesanan", 
        "id_penjual", 
        "waktu_kadaluarsa", 
        "status_hari"
    ];

    public function pembayaran() {
        return $this->hasOne(Pembayaran::class, 'id_keranjang', 'id_keranjang');
    }
}
