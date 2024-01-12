<?php

namespace App\Http\Controllers;

use App\Models\ServiceBarang;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;


class ServiceBarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (auth()->check() && ((auth()->user()->role_id == 1) || auth()->user()->role_id == 2)) {
            $service = ServiceBarang::all();
            return view('service.index', compact('service'));
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
            return view('service.create');
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
            $file=$request->file('gambar_barang');
            $file->move(public_path('storage/barang_service'), $file->getClientOriginalName());
            $kode = Str::random(5);

            $service = new ServiceBarang;
            $service->user_id = Auth::user()->id;
            $service->nama_pelanggan = $request->nama_pelanggan;
            $service->nama_barang = $request->nama_barang;
            $service->tanggal_masuk = $request->tanggal_masuk;
            $service->status = 0;
            $service->estimasi = 0;
            $service->biaya = 0;
            $service->keterangan= $request->keterangan;
            $service->kode_booking = $kode;
            $service->gambar_barang = $file->getClientOriginalName();
            $service->save();

            return redirect()->route('service.index')->with('berhasil', 'Data Telah Ditambahkan');
        }
        Alert::error('Halaman Tidak Dapat Diakses', 'Error');
        return redirect('/');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ServiceBarang  $serviceBarang
     * @return \Illuminate\Http\Response
     */
    public function show(ServiceBarang $serviceBarang)
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
        if (auth()->check() && ((auth()->user()->role_id == 1) || auth()->user()->role_id == 2)) {
            $data['service'] = ServiceBarang::find($id);

            return view('service.edit', $data);
        }
        Alert::error('Halaman Tidak Dapat Diakses', 'Error');
        return redirect('/');
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateServiceBarangRequest  $request
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (auth()->check() && ((auth()->user()->role_id == 1) || auth()->user()->role_id == 2)) {
            $service = ServiceBarang::findOrFail($id);
            
            $service->status = $request->status;
            $service->estimasi = $request->estimasi;
            $service->biaya = $request->biaya;
            $service->catatan = $request->catatan;
            $service->update();
            
            return redirect()->route('service.index')->with('berhasil', 'Data Telah Diubah');
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
    
}
