<?php

namespace Database\Seeders;

use App\Models\Golongan;
use Illuminate\Database\Seeder;

class GolonganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kode = [
            "IA",
            "IVA2",
            "IVB1",
            "III",
            "II",
            "IB",
            "III A",
            "IVA3"
        ];
        foreach ($kode as $item) {
            $data = ["golongan" => $item];
            Golongan::create($data);
        }
    }
}
