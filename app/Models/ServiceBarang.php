<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Alfa6661\AutoNumber\AutoNumberTrait;

class ServiceBarang extends Model
{
    use HasFactory;
    protected $table = "service_barang";
    protected $fillable = [
        'kode_booking','nama_barang','tanggal_masuk','keterangan','status','gambar_barang'
    ];

    
}
