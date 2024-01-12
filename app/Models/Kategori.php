<?php

namespace App\Models;

use App\Models\Produk;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    protected $guarded = ['id'];
    protected $table = "kategori";
    protected $fillable = [
        'kategori'
    ];
    public function produk()
    {
        return $this->hasMany(Produk::class);
    }
}
