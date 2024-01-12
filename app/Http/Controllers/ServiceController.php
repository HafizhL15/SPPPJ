<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use App\Models\Produk;
use App\Models\Pesanan;
use App\Models\User;
use App\Models\PesananDetail;
use App\Models\ServiceBarang;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function riwayat_service()
    {
       $services =  ServiceBarang::where('user_id', Auth::user()->id)->get();
       return view('service.home', compact('services'));
    }
    public function create()
    {
        return view('service.form');
    }

    public function service(Request $request)
    {
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

        Alert::success('Booking Service Berhasil', 'Success');
        return redirect('riwayat-service');
    }
    
    public function detail($id)
    {
    	$service = ServiceBarang::where('id', $id)->first();
     	return view('service.detail', compact('service'));
    }
}
