<?php

namespace App\Http\Controllers;
use App\Models\Produk;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function home()
    {   
        $datas['produk'] = Produk::inRandomOrder()->limit(4)->get();
        return view('front.home', $datas);
    }
    
    public function produk()
    {
        $datas['produk'] = Produk::all();
        return view('front.produk_list', $datas);
    }

    public function show(Produk $produk)
    {
        $datas['barang'] = Produk::inRandomOrder()->limit(4)->get();
        return view('front.detail', compact('produk'), $datas);
    }
    public function search(Request $request)
    {
        if($request->has('search')){
            $produk = Produk::where('nama_produk','LIKE','%'.$request->search.'%')->get();
        }
        return view('front.produk_list',['produk' => $produk]);
    }
}
