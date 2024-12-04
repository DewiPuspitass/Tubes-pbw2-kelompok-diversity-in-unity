<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;

    protected $table = "menu";
    protected $primaryKey = "id_menu";
    protected $fillable = [
        "nama_menu",
        "deskripsi_menu",
        "harga_menu",
        "id_kategori",
        "gambar_menu",
        "id_penjual",
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id_kategori');
    }

    public function penjual()
    {
        return $this->belongsTo(Penjual::class, 'id_penjual', 'id_penjual');
    }
}
