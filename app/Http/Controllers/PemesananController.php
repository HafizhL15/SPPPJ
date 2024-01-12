<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\PesananDetail;
// use App\Http\Requests\StorePemesananRequest;
// use App\Http\Requests\UpdatePemesananRequest;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use PDF;

class PemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->check() && ((auth()->user()->role_id == 1) || auth()->user()->role_id == 2)) {
            $pesanan = Pesanan::all();
            $pesanan_details = PesananDetail::all();
            return view('pemesanan.index', compact('pesanan','pesanan_details'));
        }
        Alert::error('Halaman Tidak Dapat Diakses', 'Error');
        return redirect('/');
        
    }
    public function detail($id)
    {
        if (auth()->check() && ((auth()->user()->role_id == 1) || auth()->user()->role_id == 2)) {
            $pesanan = Pesanan::where('id', $id)->first();
            $pesanan_details = PesananDetail::where('pesanan_id', $pesanan->id)->get();
            return view('pemesanan.detail', compact('pesanan','pesanan_details'));
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
        //// Tambah Data
        // return view('pemesanan.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (auth()->check() && (auth()->user()->role_id == 2)) {
            $pemesanan = Pesanan::find($id);

            return view('pemesanan.edit', compact('pemesanan'));
        }
        Alert::error('Halaman Tidak Dapat Diakses', 'Error');
        return redirect('/');
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Request  $request
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (auth()->check() && ( auth()->user()->role_id == 2)) {
            $pesan = Pesanan::where('id',$id);
            $datas = [
                'status' => $request->status,
            ];
            $pesan->update($datas);
            Alert::success('Status Pesanan Berhasil Di Update', 'Success');
            return redirect()->route('pemesanan.index');
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
        //Hapus Data
        if (auth()->check() && (auth()->user()->role_id == 1)) {
            $order = Pesanan::find($id);

            $order->delete();
            Alert::error('Data Berhasil Di Hapus', 'Success');
            return redirect()->route('pemesanan.index');
        }
        Alert::error('Halaman Tidak Dapat Diakses', 'Error');
        return redirect('/');
        
    }

}
