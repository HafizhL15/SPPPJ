<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\ServiceBarangController;
use App\Http\Controllers\RoleuserController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\KuesionerController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\RiwayatController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RekrutmenController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\HelpdeskController;
use App\Http\Controllers\Helpdesk_AdminController;
use App\Http\Controllers\DiskonController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileAdminController;


Auth::routes();

Route::get('/', [GuestController::class, 'home'])->name('home');
Route::get('/produk-list', [GuestController::class, 'produk'])->name('produk');
Route::get('/produk-list/{id}', [PesananController::class, 'index']);

Route::get('/kategori/{kategori}', [KategoriController::class, 'show'])->name('show');
Route::get('/kategori/{id}', [KategoriController::class, 'detail'])->name('detail');
Route::get('/search', [GuestController::class, 'search'])->name('search');

Route::get('/rekrutmen',[RekrutmenController::class, 'create']);
Route::post('/rekrutmen',[RekrutmenController::class, 'store']);

Route::get('/feedback',[FeedbackController::class, 'create']);
Route::post('/feedback',[FeedbackController::class, 'store']);



Route::middleware(['auth'])->group(function () {
    Route::post('/pesan/{id}', [PesananController::class, 'pesan']);
    Route::get('/checkout',[PesananController::class, 'check_out']);
    Route::delete('/checkout/{id}', [PesananController::class, 'delete']);
    Route::post('/konfirmasi', [PesananController::class, 'konfirmasi']);

    Route::get('/riwayat-pesanan',[RiwayatController::class, 'index']);
    Route::get('/riwayat-pesanan/{id}', [RiwayatController::class, 'detail']);
    Route::post('/riwayat-pesanan/{id}', [RiwayatController::class, 'pembayaran']);
    Route::delete('/riwayat-pesanan/{id}', [RiwayatController::class, 'delete']);
    Route::post('/konfirmasi-pesanan/{id}',[RiwayatController::class, 'pembayaran']);
    Route::post('/riwayat-pesanan/{id}',[RiwayatController::class, 'diskon']);    

    Route::get('/booking-service',[ServiceController::class, 'create']);
    Route::post('/booking_service', [ServiceController::class, 'service']);
    Route::get('/riwayat-service',[ServiceController::class, 'riwayat_service']);
    Route::get('/riwayat-service/{id}',[ServiceController::class, 'detail']);

    Route::get('/profile', [ProfileController::class, 'index']);
    Route::post('/profile', [ProfileController::class, 'update']);

    Route::get('/helpdesk',[HelpdeskController::class, 'index']);
    Route::get('/form-helpdesk', [HelpdeskController::class, 'create']);
    Route::post('/helpdesk',[HelpdeskController::class, 'store']);

    Route::get('/kuesioner',[KuesionerController::class, 'create']);
    Route::post('/kuesioner',[KuesionerController::class, 'store']);
});

Route::get('/dashboard', [HomeController::class, 'index']);
Route::resource('produk', ProdukController::class);
Route::resource('pemesanan', PemesananController::class);
Route::resource('admin_helpdesk', Helpdesk_AdminController::class);
Route::resource('service', ServiceBarangController::class);
Route::get('/daftar-pesanan/{id}', [PemesananController::class, 'detail']);
Route::post('/pemesanan/{id}', [PemesananController::class],'update');
Route::get('/admin-profile', [ProfileAdminController::class, 'index'])->name('profile');
Route::put('/admin-profile', [ProfileAdminController::class, 'update'])->name('profile.update');

Route::middleware(['admin'])->group(function () {
    Route::resource('pembayaran', PembayaranController::class);
    Route::resource('user', RoleuserController::class);
    Route::resource('admin-diskon', DiskonController::class);
    Route::get('/admin-kuesioner',[KuesionerController::class, 'index']);
    Route::get('/admin-feedback',[FeedbackController::class, 'index']);
    Route::get('/admin-rekrutmen',[RekrutmenController::class, 'index']);
    Route::get('/admin-rekrutmen/{id}', [RekrutmenController::class, 'detail']);
    Route::get('/admin-rekrutmen/unduh-resume/{id}', [RekrutmenController::class, 'unduh'])->name('unduh.resume');

    Route::get('/laporan', [LaporanController::class, 'index']);
    Route::get('/laporan-pemesanan', [LaporanController::class, 'laporanPemesanan']);
    Route::get('/laporan-pembayaran', [LaporanController::class, 'laporanPembayaran']);
    Route::get('/laporan-barang', [LaporanController::class, 'laporanBarang']);
    Route::get('/laporan-service', [LaporanController::class, 'laporanService']);
    Route::get('/laporan-kuesioner', [LaporanController::class, 'laporanKuesioner']);
    Route::get('/laporan-feedback', [LaporanController::class, 'laporanFeedback']);
});

Route::fallback(function () {
    return view('erorr');
});