<?php

namespace Database\Seeders;

use App\Models\Pegawai;
use App\Models\Pelanggan;
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
        $this -> call([
            RolesandPermissionsSeeder::class,
            AreaSeeder::class,
            AdminSeeder::class,
            KecamatanSeeder::class,
            KelurahanSeeder::class,
            GolonganSeeder::class,
            PegawaiSeeder::class,
            PelangganSeeder::class,
        ]);
    }
}
