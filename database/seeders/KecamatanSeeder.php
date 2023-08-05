<?php

namespace Database\Seeders;

use App\Models\Kecamatan;
use Illuminate\Database\Seeder;

class KecamatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kecamatan = ["Susut", "Tembuku", "Bangli", "Kintamani"];
        for ($i = 0; $i < count($kecamatan); $i++) {
            $data = ["kecamatan" => $kecamatan[$i]];
            Kecamatan::create($data);
        }
    }
}
