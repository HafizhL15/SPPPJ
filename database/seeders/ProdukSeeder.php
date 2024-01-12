<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Produk;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Produk::create([
            // 'kode_produk' => 'Al423',
            'nama_produk' => 'Laptop Acer Aspire',
            'deskripsi_produk' => 'Laptop Spek Dewa',
            'stok_produk' => '4',
            'harga_produk' => '5000000',
            'kategori' => 'Laptop',
            'gambar' => 'download.jpg',
        ]);
        Produk::create([
            // 'kode_produk' => 'Al423',
            'nama_produk' => 'Personal Computer',
            'deskripsi_produk' => 'Computer untuk semua kalangan',
            'stok_produk' => '8',
            'harga_produk' => '4000000',
            'kategori' => 'Personal Computer',
            'gambar' => 'casing psu dst.jpg',
        ]);
    }
}
