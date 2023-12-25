<?php

namespace Database\Seeders;

use App\Models\PegawaiArea;
use Illuminate\Database\Seeder;

class PegawaiAreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                "area_id" => 1,
                "pegawai_id" => 2,
            ],
            [
                "area_id" => 4,
                "pegawai_id" => 2,
            ],
            [
                "area_id" => 7,
                "pegawai_id" => 2,
            ],
            [
                "area_id" => 10,
                "pegawai_id" => 2,
            ],
            [
                "area_id" => 13,
                "pegawai_id" => 2,
            ],
            [
                "area_id" => 13,
                "pegawai_id" => 3,
            ],
            [
                "area_id" => 20,
                "pegawai_id" => 3,
            ],
            [
                "area_id" => 24,
                "pegawai_id" => 3,
            ],
        ];

        foreach ($data as $item) {
            PegawaiArea::create($item);
        }
    }
}
