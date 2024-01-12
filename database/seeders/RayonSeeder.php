<?php

namespace Database\Seeders;

use App\Models\Rayon;
use Illuminate\Database\Seeder;
use Rap2hpoutre\FastExcel\FastExcel;

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
            '1024',
            '1408',
            '0406',
            '1305',
            '0922',
            '1323',
            '0812',
            '0813',
            '0814',
            '1324',
            '1325',
            '1326',
            '1327',
            '1328',
            '1330',
            '1331',
            '1332',
            '0317',
            '0318',
            '0319',
            '0320',
            '0716',
            '0717',
            '1228',
            '0210',
            '0211',
            '0101',
            '0102',
            '0103',
            '0104',
            '0615',
            '1131',
            '0507',
        ];
        foreach ($kode as $item) {
            $data = ["kode_rayon" => $item];
            Rayon::create($data);
        }


    }
}
