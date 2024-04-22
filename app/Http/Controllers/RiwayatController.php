<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Pesanan;
use App\Models\Diskon;
use App\Models\User;
use App\Models\PesananDetail;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;


class RiwayatController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
    	$pesanans = Pesanan::where('user_id', Auth::user()->id)->where('status', '!=',0)->get();

    	return view('riwayat.index', compact('pesanans'));
    }

    public function detail($id)
    {
    	$pesanan = Pesanan::where('id', $id)->first();
    	$pesanan_details = PesananDetail::where('pesanan_id', $pesanan->id)->get();
        $diskons = Diskon::where('ditukarkan_pengguna', Auth::user()->id)->where('pesanan_id', $pesanan->id)->first();
        
        if(empty($diskons)){
            $diskonan = 0;
            $data = [
                'pesanan' => $pesanan,
                'pesanan_details' => $pesanan_details,
                'diskon' => $diskonan,
            ];
        }else{
            $diskonan = $diskons->diskon;
            $data = [
                'pesanan' => $pesanan,
                'pesanan_details' => $pesanan_details,
                'diskon' => $diskonan,
            ];
        }

        return view('riwayat.detail', $data);
     	
    }
    public function pembayaran(Request $request, $id)
    {
        $pesan = Pesanan::where('user_id', Auth::user()->id)->where('status',1)->first();
        
        $file=$request->file('bukti_pembayaran');
        $file->move(base_path('public/storage/pembayaran'), $file->getClientOriginalName());

        $pesan->bukti_pembayaran = $file->getClientOriginalName();
        $pesan->status = 2;
        $pesan->update();
        
        Alert::success('Konfirmasi Pembayaran Berhasil', 'Succes');
        return redirect('riwayat-pesanan');
    }

    public function selesaiPesanan($id)
    {
        $pesan = Pesanan::findOrFail($id);
        $pesan->status = 5;
        $pesan->update();
        
        Alert::success('Pesanan Telah Selesai', 'Succes');
        return redirect()->back();
    }

    public function delete($id)
    {
        $pesanan = Pesanan::where('id', $id)->first();
        $pesanan->delete();

        $pesanan_details = PesananDetail::where('pesanan_id', $id)->get();
        foreach ($pesanan_details as $pesanan_detail) {
            $barang = Produk::where('id', $pesanan_detail->produk_id)->first();
            $barang->stok_produk = $barang->stok_produk+$pesanan_detail->jumlah;
            $barang->update();
        }

        Alert::error('Pesanan Berhasil Di Hapus', 'Success');
        return redirect('riwayat-pesanan');
    }

    public function diskon(Request $request, $id)
    {
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('id', $id)->first();
        $pesanan_details = [];
        $diskons = [];
        
        $request->validate(['kode_diskon' => 'nullable|exists:diskons,kode_diskon',]);

        $totalHarga =  $pesanan->jumlah_harga;
        $diskon = Diskon::where('kode_diskon', $request->input('kode_diskon'))->first();
        $ditukarkanPengguna = $diskon->ditukarkan_pengguna;

        if($diskon && $ditukarkanPengguna === null) {
            $harga_diskon = $diskon->diskon;
            $diskon->ditukarkan_pengguna = Auth::user()->id;
            $diskon->pesanan_id = $pesanan->id;
            $diskon->update();
        }else{
            return redirect()->back()->with('error', 'Kode diskon sudah digunakan.');
        }

        // Hitung total harga setelah diskon
        if(!empty($pesanan))
        {
            $pesanan_details = PesananDetail::where('pesanan_id', $pesanan->id)->get();
            $totalHargaSetelahDiskon = $this->hitungTotalHargaSetelahDiskon($totalHarga, $harga_diskon);
            $pesanan->jumlah_harga = $totalHargaSetelahDiskon;
            $pesanan->update();
        }
        else {
            $pesanan->jumlah_harga = 0;
            $pesanan->update();
        }
        $diskonan = $diskon->diskon;
        $data = [
            'pesanan' => $pesanan,
            'pesanan_details' => $pesanan_details,
            'diskon' => $diskonan,
        ];

        return view('riwayat.detail', $data);
    }
    private function hitungTotalHargaSetelahDiskon($totalHarga, $diskon)
    {
        if (!$diskon) {
            return $totalHarga;
        }

        // Hitung total harga setelah diskon
        $totalSetelahDiskon = $totalHarga - $diskon;

        return max(0, $totalSetelahDiskon); // Pastikan total tidak kurang dari 0
    }
}
