<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use Illuminate\Http\Request;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Daftar Produk
        $pesanan = Pesanan::whereIn('status', [3, 4])->get();
        return view('pembayaran.index', compact('pesanan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     //Tambah Data
    //     return view('pembayaran.create');
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \App\Http\Requests\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {
    //     //Simpan Data
    //     $request->validate([
            
    //     ]);

    //     $file=$request->file('bukti_pembayaran');
    //     $file->move(base_path('public/storage/pembayaran'), $file->getClientOriginalName());

    //     $datas = [
    //         'id_pembayaran' => $request->id_pembayaran,
    //         'id_pesanan' => $request->id_pesanan,
    //         'jumlah_pembayaran' => $request->jumlah_pembayaran,
    //         'tanggal_pembayaran' => $request->tanggal_pembayaran,
    //         'bukti_pembayaran' => $file->getClientOriginalName(),
    //     ];

    //     Pembayaran::create($datas);

    //     return redirect()->route('pembayaran.index')->with('berhasil', 'Data Telah Ditambahkan');
    // }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  \App\Models\Pembayaran  $pembayaran
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show(Pembayaran $pembayaran)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit($id)
    // {
    //     $data['pembayaran'] = Pembayaran::find($id);

    //     return view('pembayaran.edit', $data);
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \App\Http\Requests\UpdatePembayaranRequest  $request
    //  * @param  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, $id)
    // {
    //     //
    //     $payment = Pembayaran::findOrFail($id);
    //     $request->validate([
            
    //     ]);

    //     $file=$request->file('bukti_pembayaran');
    //     $file->move(base_path('public/storage/pembayaran'), $file->getClientOriginalName());

    //     $datas = [
    //         'id_pembayaran' => $request->id_pembayaran,
    //         'id_pesanan' => $request->id_pesanan,
    //         'jumlah_pembayaran' => $request->jumlah_pembayaran,
    //         'tanggal_pembayaran' => $request->tanggal_pembayaran,
    //         'bukti_pembayaran' => $file->getClientOriginalName(),
    //     ];
    //     $payment->update($datas);

    //     return redirect()->route('pembayaran.index')->with('berhasil', 'Data Telah Diubah');
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy($id)
    // {
    //     //Hapus Data
    //     $payment = Pembayaran::find($id);

    //     $payment->delete();

    //     return redirect()->route('pembayaran.index')->with('berhasil','Data Telah Dihapus');
    // }
}