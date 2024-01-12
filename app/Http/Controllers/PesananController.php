<?php

namespace App\Http\Controllers;
use App\Models\Produk;
use App\Models\Pesanan;
use  App\Models\Diskon;
use App\Models\User;
use App\Models\PesananDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;


class PesananController extends Controller
{

    public function home()
    {
        $barangs = Produk::paginate(9);
        return view('pesan.home', compact('barangs'));
    }

    public function index($id)
    {
    	$produk= Produk::where('id', $id)->first();

    	return view('pesan.index', compact('produk'));
    }

    public function pesan(Request $request, $id)
    {	
        $this->middleware('auth');
    	$barang = Produk::where('id', $id)->first();
    	$tanggal = Carbon::now();

        //validasi apakah melebihi stok
    	if($request->jumlah_pesan > $barang->stok_produk)
    	{
    		return redirect()->back()->with('error', 'Jumlah Pesanan melebihi Stok.');
    	}

        //cek validasi
    	$cek_pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
    	
        //simpan ke database pesanan
    	if(empty($cek_pesanan))
    	{
            $pesanan = new Pesanan;
            $pesanan->user_id = Auth::user()->id;
            $pesanan->fullname = Auth::user()->fullName;
            $pesanan->tanggal = $tanggal;
            $pesanan->status = 0;
            // $pesanan->jumlah_barang = 0;
            $pesanan->jumlah_harga = 0;
            $pesanan->kode = mt_rand(100, 999);
            $pesanan->save();
        }

        //simpan ke database pesanan detail
    	$pesanan_baru = Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();

    	//cek pesanan detail
    	$cek_pesanan_detail = PesananDetail::where('produk_id', $barang->id)->where('pesanan_id', $pesanan_baru->id)->first();
    	if(empty($cek_pesanan_detail))
    	{
    		$pesanan_detail = new PesananDetail;
	    	$pesanan_detail->produk_id = $barang->id;
	    	$pesanan_detail->pesanan_id = $pesanan_baru->id;
	    	$pesanan_detail->jumlah = $request->jumlah_pesan;
            // $pesanan->jumlah_barang = $pesanan->jumlah_barang + $request->jumlah_pesan;
	    	$pesanan_detail->jumlah_harga = $barang->harga_produk*$request->jumlah_pesan;
	    	$pesanan_detail->save();
    	}else 
    	{
    		$pesanan_detail = PesananDetail::where('produk_id', $barang->id)->where('pesanan_id', $pesanan_baru->id)->first();

    		$pesanan_detail->jumlah = $pesanan_detail->jumlah+$request->jumlah_pesan;

    		//harga sekarang
    		$harga_pesanan_detail_baru = $barang->harga_produk*$request->jumlah_pesan;
	    	$pesanan_detail->jumlah_harga = $pesanan_detail->jumlah_harga+$harga_pesanan_detail_baru;
	    	$pesanan_detail->update();
    	}
    
    	//jumlah total
    	$pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
    	$pesanan->jumlah_harga = $pesanan->jumlah_harga+$barang->harga_produk*$request->jumlah_pesan;
        // $total_harga = $pesanan->jumlah_harga+$barang->harga_produk*$request->jumlah_pesan;
        // $pesanan->jumlah_barang = $pesanan->jumlaha_barang +
    	$pesanan->update();
    	
        Alert::success('Pesanan Masuk Ke Keranjang', 'Success');
    	// return redirect('check-out');
        return redirect('produk-list');
    }

    

    public function check_out()
    {
        $this->middleware('auth');
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
 	    $pesanan_details = [];
        if(!empty($pesanan))
        {
            $pesanan_details = PesananDetail::where('pesanan_id', $pesanan->id)->get();
        }
        return view('pesan.checkout', compact('pesanan', 'pesanan_details'));
    }

    public function delete($id)
    {
        $this->middleware('auth');
        $pesanan_detail = PesananDetail::where('id', $id)->first();

        $pesanan = Pesanan::where('id', $pesanan_detail->pesanan_id)->first();
        $pesanan->jumlah_harga = $pesanan->jumlah_harga-$pesanan_detail->jumlah_harga;
        $pesanan->update();
        $pesanan_detail->delete();

        Alert::error('Produk Sukses Dihapus', 'Hapus');
        return redirect('checkout');
    }

    public function konfirmasi(Request $request)
    {
        $this->middleware('auth');
        $pesanan = Pesanan::where('user_id', Auth::user()->id)->where('status',0)->first();
        $pesanan_id = $pesanan->id;
        $pesanan->status = 1;
        $pesanan->nama_pesanan = $request->nama_pesanan;
        $pesanan->alamat = $request->alamat;
        $pesanan->kecamatan = $request->kecamatan;
        $pesanan->kabupaten = $request->kabupaten;
        $pesanan->jenis_pesanan = $request->jenis_pesanan;
        $pesanan->update();

        $pesanan_details = PesananDetail::where('pesanan_id', $pesanan_id)->get();
        foreach ($pesanan_details as $pesanan_detail) {
            $barang = Produk::where('id', $pesanan_detail->produk_id)->first();
            $barang->stok_produk = $barang->stok_produk-$pesanan_detail->jumlah;
            $barang->update();
        }
        Alert::success('Pesanan Sukses! Silahkan Lanjutkan Proses Pembayaran', 'Success');
        return redirect('riwayat-pesanan');
    }
    
}
