<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;
use App\Models\PesananDetail;
use App\Models\Pembayaran;
use App\Models\Feedback;
use App\Models\Kuesioner;
use App\Models\Produk;
use App\Models\ServiceBarang;

use Barryvdh\DomPDF\PDF;

class LaporanController extends Controller
{
    public function index()
    {
        return view('admin.laporan');
    }
    public function laporanPemesanan()
    {
        $pesanan = Pesanan::all();
    	$pesanan_details = PesananDetail::all();
        $data = [
                'pesanan' => $pesanan,
                'pesanan_details' => $pesanan_details,
            ];
        
        $pdf = app('dompdf.wrapper');
        $pdf->loadView('laporan.pemesanan', ['pesanan' => $pesanan, 'pesanan_details' => $pesanan_details])->setPaper('landscape');
        
        return $pdf->download('Laporan Pemesanan.pdf');
    }
    public function laporanPembayaran()
    {
        $data = Pesanan::whereIn('status', [3, 4])->get();;
        $pdf = app('dompdf.wrapper');
        $pdf->loadView('laporan.pembayaran', ['data' => $data])->setPaper('landscape');
        
        return $pdf->download('Laporan Pembayaran.pdf');
    }
    public function laporanBarang()
    {
        $data = Produk::all();
        $pdf = app('dompdf.wrapper');
        $pdf->loadView('laporan.barang', ['data' => $data])->setPaper('landscape');
        
        return $pdf->download('Laporan Barang.pdf');
    }
    public function laporanService()
    {
        $data = ServiceBarang::all();
        $pdf = app('dompdf.wrapper');
        $pdf->loadView('laporan.service', ['data' => $data])->setPaper('landscape');
        
        return $pdf->download('Laporan Service Barang.pdf');
    }
    public function laporanKuesioner()
    {
        $data = Kuesioner::all();
        $pdf = app('dompdf.wrapper');
        $pdf->loadView('laporan.kuesioner', ['data' => $data])->setPaper('landscape');
        
        return $pdf->download('Laporan Kuesioner.pdf');
    }
    public function laporanFeedback()
    {
        $data = Feedback::all();
        $pdf = app('dompdf.wrapper');
        $pdf->loadView('laporan.feedback', ['data' => $data])->setPaper('landscape');
        return $pdf->download('Laporan Kritik Saran.pdf');
    }
}
