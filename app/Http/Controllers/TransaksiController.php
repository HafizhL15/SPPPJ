<?php

namespace App\Http\Controllers;

use App\Models\Pemesanan;
use App\Models\Produk;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas['produk'] = Produk::all();
        return view('front.detail', $datas);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        ////Simpan Data
        // $this->middleware('auth');
        $datas = [
            'user_id' => auth()->id(),
            'produk_id' => $request->produk_id,
            'nama_produk' => $request->nama_produk,
            'jumlah_barang' => $request->jumlah_barang,
            'total_harga' => $request->total_harga,
            'tanggal_pesanan' => $request->tanggal_pesanan,
            // 'status'=> $request->status,
            // 'gambar' => $file->getClientOriginalName(),
        ];

        Pemesanan::create($datas);

        // Validasi data yang diterima
        // $validatedData = $request->validate([
        //     'produk_id' => 'required|id',
        //     'jumlah_barang' => 'required|integer',
        //     'harga_produk' => 'required|numeric',
        //     // 'tanggal_pesanan' => 'required|date',
        // ]);

        // // Ambil ID produk dari permintaan
        // // $product_id = $request->input('produk_id');

        // // Hitung total harga berdasarkan jumlah barang dan harga produk
        // $total_harga = $validatedData['harga_produk'] * $validatedData['jumlah_barang'];

        // // Buat data pesanan baru
        // $order = new Pemesanan([
        //     'user_id' => auth()->id(),
        //     'produk_id' => $validatedData['produk_id'],
        //     'jumlah_barang' => $validatedData['jumlah_barang'],
        //     'total_harga' => $total_harga,
        //     'tanggal_pesanan' => Carbon::now(),
        // ]);

        // $order->save();

        // Berikan respons atau tindakan lain yang diinginkan setelah data berhasil disimpan
        return redirect('/daftar-pesanan')->with('berhasil', 'Data Telah Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pemesanan  $pemesanan
     * @return \Illuminate\Http\Response
     */
    public function show(Pemesanan $pemesanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pemesanan  $pemesanan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pemesanan $pemesanan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pemesanan  $pemesanan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pemesanan $pemesanan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pemesanan  $pemesanan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pemesanan $pemesanan)
    {
        //
    }
}
