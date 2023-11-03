<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RayonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $kode = [
            '0101',
            '0102',
            '0103',
            '0104',
            '0210',
            '0211',
            '0317',
            '0318',
            '0319',
            '0320',
            '0406',
            '0507',
            '0615',
            '0716',
            '0717',
            '0812',
            '0813',
            '0922',
        ];
        foreach ($kode as $item) {
            $data = ["golongan" => $item];
            ::create($data);
        }
    }
}
