<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjual extends Authenticatable
{
    use HasFactory;

    protected $table = "penjual";
    protected $primaryKey = "id_penjual";

    protected $fillable = [
        'nama_kedai',
        'email',
        'password',
        'foto',
        'barcode_qris',
    ];

    protected $hidden = ['password'];
    public $timestamps = false;

    public function menus()
    {
        return $this->hasMany(Menu::class, 'id_penjual', 'id_penjual');
    }
}

