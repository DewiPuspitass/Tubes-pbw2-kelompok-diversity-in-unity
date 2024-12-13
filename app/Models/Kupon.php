<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kupon extends Model
{
    use HasFactory;

    protected $table = "vouchers";
    
    protected $fillable = [
        "id",
        "nama", 
        "harga",
        "status"
    ];

    // Pastikan keyType adalah string karena menggunakan UUID
    protected $keyType = 'string';

    // UUID tidak menggunakan auto increment
    public $incrementing = false;

}
