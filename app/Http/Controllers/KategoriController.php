<?php

namespace App\Http\Controllers;
use App\Models\Produk;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function show($kategori)
    {
        $barang = Produk::where('kategori', $kategori)->get();
        return view('front.kategori', compact('barang'));
    }
    public function detail($id)
    {
    	$barang= Produk::where('id', $id)->first();

    	return view('pesan.index', compact('barang'));
    }
}
