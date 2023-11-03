<?php

namespace Database\Seeders;

use App\Models\JenisPengumuman;
use Illuminate\Database\Seeder;

class JenisPengumumanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jenis = ["Pencabutan", "Penyegelan", "Tagihan", "Pengumuman", "Bangli Terkini"];

        foreach ($jenis as $item) {
            $data = ["jenis" => $item];
            JenisPengumuman::create($data);
        }
    }
}
