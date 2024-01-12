<?php

namespace App\Models;
use App\Models\Kategori;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pemesanan;
class Produk extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = "produk";
    protected $fillable = [
        // 'kode_produk',
        'nama_produk','harga_produk','stok_produk','deskripsi_produk','kategori','gambar'
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }
    public function pesanan()
    {
        return $this->hasMany(Pemesanan::class);
    }
    public function pesanan_detail() 
	{
	     return $this->hasMany('App\Model\PesananDetail','produk_id', 'id');
	}
}
