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
            'IA',
            'IB',
            'II',
            'III',
            'III A',
            'IVA',
            'IVA1',
            'IVA2',
            'IVA3',
            'IVB',
            'IVB1',
        ];
        foreach ($kode as $item) {
            $data = ["golongan" => $item];
            Golongan::create($data);
        }
    }
}
