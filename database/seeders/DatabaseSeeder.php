<?php

namespace Database\Seeders;

use App\Models\Kategori;
use App\Models\Pembayaran;
use App\Models\Pemesanan;
use App\Models\Produk;
use App\Models\Roleuser;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //$this->call(UsersTableSeeder::class);
        // $this->call(PemesananSeeder::class);
        // $this->call(ProdukSeeder::class);

        // User::create([
        //     'role_id' => '1',
        //     'name' => 'Admin',
        //     'last_name' => 'Admin',
        //     'email' => 'admin@gmail.com',
        //     'password' => bcrypt('admin123'),
        // ]);

        Roleuser::create([
            'role' => 'Admin',
        ]);
        Roleuser::create([
            'role' => 'Customer Service',
        ]);
        Roleuser::create([
            'role' => 'Pelanggan',
        ]);

    }


}
