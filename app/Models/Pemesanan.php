<?php

namespace App\Models;
use App\Models\Produk;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class Pemesanan extends Model
{
    use HasFactory;
    protected $table = "pemesanan";
    protected $fillable = [
        'user_id','produk_id','nama_produk','jumlah_barang','total_harga','tanggal_pesanan','status'
    ];
    protected $guarded = ['id'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function product()
    {
        return $this->belongsTo(Produk::class);
    }
    public function status():Attribute
    {
        return new Attribute(
            get: fn ($value) => ["diproses", "dikirim", "selesai"][$value],
        );
    }
}
