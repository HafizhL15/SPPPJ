<?php

namespace App\Http\Controllers;

use App\Models\Rekrutmen;
use App\Http\Requests\StoreRekrutmenRequest;
use App\Http\Requests\UpdateRekrutmenRequest;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class RekrutmenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {   
        $rekrutmen = Rekrutmen::all();
        return view('admin.rekrutmen', compact('rekrutmen'));
    }
    public function detail($id)
    {
        $rekrutmen= Rekrutmen::where('id', $id)->first();
        return view('admin.detail_rekrutmen', compact('rekrutmen'));
    }

    public function create()
    {
        return view('rekrutmen.form');
    }

    public function store(Request $request)
    {
        $file=$request->file('resume');
        $file->move(public_path('storage/rekrutmen'), $file->getClientOriginalName());

        $rekrutmen = new Rekrutmen;
        $rekrutmen->nama_lengkap = $request->nama_lengkap;
        $rekrutmen->nik = $request->nik;
        $rekrutmen->jenis_kelamin = $request->jenis_kelamin;
        $rekrutmen->tempat_lahir = $request->tempat_lahir;
        $rekrutmen->tanggal_lahir = $request->tanggal_lahir;
        $rekrutmen->alamat = $request->alamat;
        $rekrutmen->email = $request->email;
        $rekrutmen->no_telepon = $request->no_telepon;
        $rekrutmen->status = $request->status;
        $rekrutmen->resume = $file->getClientOriginalName();
        $rekrutmen->save();

        Alert::success('Terimakasih Sudah Mendaftar, Silahkan Menunggu Email Dari Kami', 'Success');
        return redirect('rekrutmen');
    }

    public function unduh($id)
    {
        $rekrutmen = Rekrutmen::findOrFail($id);

        $pathToFile = storage_path('app/public/rekrutmen/' . $rekrutmen->resume);
        
        return response()->download($pathToFile, 'resume_' . $rekrutmen->id . '.pdf');
    }
    public function show(Rekrutmen $rekrutmen)
    {
        //
    }

    public function edit(Rekrutmen $rekrutmen)
    {
        //
    }


    public function update(UpdateRekrutmenRequest $request, Rekrutmen $rekrutmen)
    {
        //
    }

    public function destroy(Rekrutmen $rekrutmen)
    {
        //
    }
}
