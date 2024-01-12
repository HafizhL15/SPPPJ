<?php

namespace App\Http\Controllers;

use App\Models\Diskon;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;
use Carbon\Carbon;

class DiskonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $diskon = Diskon::all();
        return view('diskon.index', compact('diskon'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('diskon.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tanggal = Carbon::now();
        $kode = Str::random(10);
        $diskon = new Diskon;
        $diskon->kode_diskon = $kode;
        $diskon->diskon = $request->diskon;
        $diskon->tanggal_akhir = $tanggal;
        $diskon->save();

        Alert::success('Kode Diskon Berhasil Dibuat', 'Success');
        return redirect('/admin-diskon');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Diskon  $diskon
     * @return \Illuminate\Http\Response
     */
    public function show(Diskon $diskon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Diskon  $diskon
     * @return \Illuminate\Http\Response
     */
    public function edit(Diskon $diskon)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Diskon  $diskon
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Diskon $diskon)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Diskon  $diskon
     * @return \Illuminate\Http\Response
     */
    public function destroy(Diskon $diskon,$id)
    {
        ////Hapus Data
        $diskon = Diskon::find($id);
        $diskon->delete();

        Alert::error('Kode Diskon Berhasil Dihapus', 'Success');
        return redirect('/admin-diskon');
    }
}
