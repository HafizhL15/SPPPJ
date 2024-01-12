<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Pesanan;
use App\Models\Produk;
use App\Models\ServiceBarang;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (auth()->check() && ((auth()->user()->role_id == 1) || auth()->user()->role_id == 2)) {
            $users = User::count();
            $pesanans = Pesanan::count();
            $produk = Produk::count();
            $service = ServiceBarang::count();

            $widget = [
                'users' => $users,
                'pesanans' => $pesanans,
                'produk' => $produk,
                'service' => $service
            
            ];
            return view('admin.dashboard', compact('widget'));
        }

        // Jika bukan admin, redirect ke halaman lain atau tampilkan pesan error
        Alert::error('Halaman Tidak Dapat Diakses', 'Error');
        return redirect('/');
        

        
    }
}
