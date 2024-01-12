<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;
    public function user()
	{
	      return $this->belongsTo('App\Model\User','user_id', 'id');
	}

	public function pesanan_detail() 
	{
	     return $this->hasMany('App\Model\PesananDetail','pesanan_id', 'id');
	}
}
