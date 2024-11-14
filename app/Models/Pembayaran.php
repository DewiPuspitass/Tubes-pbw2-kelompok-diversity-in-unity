<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    protected $table = 'pembayaran';
    protected $primaryKey = "id_pembayaran";
    protected $fillable = ["id_keranjang", "bukti_pembayaran", "status_konfirmasi"];


    public function keranjang(){
        return $this->belongsTo(User::class);
    }
}
