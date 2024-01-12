<?php

namespace App\Http\Controllers;
use App\Models\Kuesioner;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;

class KuesionerController extends Controller
{
    public function index()
    {
        $this->middleware('admin');
        $kuesioner = Kuesioner::all();
        return view('admin.kuesioner', compact('kuesioner'));
    }
    public function create()
    {
        return view('kuesioner.form');
    }
    public function store(Request $request)
    {
        $tanggal = Carbon::now();
        $kuesioner = new Kuesioner;
        $kuesioner->user_id = Auth::user()->id;
        $kuesioner->nama = $request->nama;
        $kuesioner->tanggal = $tanggal;
        $kuesioner->pertanyaan_1 = $request->pertanyaan_1;
        $kuesioner->pertanyaan_2 = $request->pertanyaan_2;
        $kuesioner->pertanyaan_3 = $request->pertanyaan_3;
        $kuesioner->pertanyaan_4 = $request->pertanyaan_4;
        $kuesioner->pertanyaan_5 = $request->pertanyaan_5;
        $kuesioner->save();

        Alert::success('Terimakasih Sudah Mengisi Kuesioner Kami', 'Success');
        return redirect('/kuesioner');
    }
}
