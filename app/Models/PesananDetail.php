<?php

namespace App\Models;
use App\Models\Produk;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PesananDetail extends Model
{
    use HasFactory;
    public function produk()
	{
	      return $this->belongsTo('App\Models\Produk','produk_id', 'id');
	}

	public function pesanan()
	{
	      return $this->belongsTo('App\Models\Pesanan','pesanan_id', 'id');
	}
}
