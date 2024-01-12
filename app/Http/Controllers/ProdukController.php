<?php

namespace App\Http\Controllers;

use App\Models\Produk;
// use App\Http\Requests\StoreProdukRequest;
// use App\Http\Requests\UpdateProdukRequest;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->check() && ((auth()->user()->role_id == 1) || auth()->user()->role_id == 2)) {
            $datas['produk'] = Produk::all();
            return view('produk.index', $datas);
        }
        Alert::error('Halaman Tidak Dapat Diakses', 'Error');
        return redirect('/');
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (auth()->check() && ((auth()->user()->role_id == 1) || auth()->user()->role_id == 2)) {
            return view('produk.create');            
        }
        Alert::error('Halaman Tidak Dapat Diakses', 'Error');
        return redirect('/');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (auth()->check() && ((auth()->user()->role_id == 1) || auth()->user()->role_id == 2)) {
            $file=$request->file('gambar');
            $file->move(public_path('storage/produk'), $file->getClientOriginalName());

            $produk = new Produk;
            $produk->nama_produk = $request->nama_produk;
            $produk->stok_produk = $request->stok_produk;
            $produk->harga_produk = $request->harga_produk;
            $produk->kategori = $request->kategori;
            $produk->deskripsi_produk = $request->input('deskripsi_produk');
            $produk->gambar = $file->getClientOriginalName();
            $produk->save();

            return redirect()->route('produk.index')->with('berhasil', 'Data Produk Telah Ditambahkan');
        }
        Alert::error('Halaman Tidak Dapat Diakses', 'Error');
        return redirect('/');

        
    }

    /**
     * Display the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    /**
     * Show the form for editing the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (auth()->check() && ((auth()->user()->role_id == 1) || auth()->user()->role_id == 2)) {
            $data['produk'] = Produk::find($id);
            return view('produk.edit', $data);
        }
        Alert::error('Halaman Tidak Dapat Diakses', 'Error');
        return redirect('/');
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateProdukRequest  $request
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (auth()->check() && ((auth()->user()->role_id == 1) || auth()->user()->role_id == 2)) {
            $barang = Produk::findOrFail($id);
            $file=$request->file('gambar');
            if(!empty($file))
            {
                $file->move(public_path('storage/produk'), $file->getClientOriginalName());
            }
            
            if(!empty($file))
            {
                $datas = [
                    'nama_produk' => $request->nama_produk,
                    'stok_produk' => $request->stok_produk,
                    'harga_produk' => $request->harga_produk,
                    'kategori' => $request->kategori,
                    'deskripsi_produk' => $request->input('deskripsi_produk'),
                    'gambar' => $file->getClientOriginalName(),
                ];
                $barang->update($datas);
            }
            else{
                $datas = [
                    'nama_produk' => $request->nama_produk,
                    'stok_produk' => $request->stok_produk,
                    'harga_produk' => $request->harga_produk,
                    'kategori' => $request->kategori,
                    'deskripsi_produk' => $request->input('deskripsi_produk'),
                    
                ];
                $barang->update($datas);
            }
            return redirect()->route('produk.index')->with('berhasil', 'Data Telah Diubah');
        }
        Alert::error('Halaman Tidak Dapat Diakses', 'Error');
        return redirect('/');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (auth()->check() && ((auth()->user()->role_id == 1) || auth()->user()->role_id == 2)) {
            $produk = Produk::find($id);
            $produk->delete();
            return redirect()->route('produk.index')->with('berhasil','Data Telah Dihapus');
        }
        Alert::error('Halaman Tidak Dapat Diakses', 'Error');
        return redirect('/');
    }


}
