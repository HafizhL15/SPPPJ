<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Pemesanan;
use App\Models\User;
class StatusController extends Controller
{
    public function new(Produk $produk, User $user)
    {
        $status = 0;
        $user = auth()->user()->produk('produk.user_id');
        $collection = Pemesanan::where('status', $status)->latest()->get();
        return view('farmer.new', compact('product'))->with('collection', $collection);
    }
    public function onsend()
    {
        $status = 1;
        $user = auth()->user()->produk()->pluck('produk.user_id');
        $collection = Pemesanan::where('status', $status)->latest()->get();
        return view('farmer.onsend')->with('collection', $collection);
    }
    public function finish()
    {
        $status = 2;
        $user = auth()->user()->produk()->pluck('produk.user_id');
        $collection = Pemesanan::where('status', $status)->latest()->get();
        return view('farmer.finish')->with('collection', $collection);
    }
}
