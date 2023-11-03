<?php

namespace Database\Seeders;

use App\Models\Golongan;
use App\Models\Pelanggan;
use App\Models\Rayon;
use App\Models\Rekening;
use Illuminate\Database\Seeder;
use Rap2hpoutre\FastExcel\FastExcel;

class RekeningSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $xls = (new FastExcel()) -> import('/home/freak_mei/Downloads/uas/pelanggan.xlsx');
        foreach($xls as $index=>$item) {
            $namaPelanggan = $item['pelanggan'];
            $no_rekening = $item['nosamb'];

            $golongan = Golongan::where('golongan', $item['gol']) -> first();
            $rayon = Rayon::where('kode_rayon', $item['koderayon']) -> first();

            $pelanggan = Pelanggan::where('nama_pelanggan', $namaPelanggan) -> first();
            $value = [
                "pelanggan_id" => $pelanggan -> id,
                "no_rekening" => $no_rekening,
                "kecamatan_id" => null,
                "kelurahan_id" => null,
                "area_id" => null,
                "lat" => "-8.4639394",
                "lng" => "115.3497947",
                "golongan_id" => $golongan -> id,
                "rayon_id" => $rayon -> id,
                "register" => 0
            ];
            Rekening::create($value);
        }
    }
}
