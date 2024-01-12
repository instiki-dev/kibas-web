<?php

namespace Database\Seeders;

use App\Models\Area;
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
       $xls = (new FastExcel()) -> import('/home/freak_mei/Downloads/uas/data_pelanggan_new.xlsx');
        foreach($xls as $index=>$item) {
            $namaPelanggan = $item['nama'];
            $no_rekening = $item['nosamb'];
            if (strlen($no_rekening) < 9) {
                $no_rekening = '0'.$no_rekening;
            }
            $rekening = Rekening::where('no_rekening', $no_rekening) -> first();
            $kodeRayon = $item["koderayon"];
            $len = strlen(($item['koderayon']));
            if($len < 4) {
                $kodeRayon = '0'.$kodeRayon;
            }

            if (!$rekening) {
                $golongan = Golongan::where('golongan', $item['kodegol']) -> first();
                $rayon = Rayon::where('kode_rayon', $kodeRayon) -> first();
                $area = Area::where('area', $item['namarayon']) -> first();

                if (!$rayon) {
                    dd($kodeRayon);
                }


                $pelanggan = Pelanggan::where('nama_pelanggan', $namaPelanggan) -> first();
                $value = [
                    "pelanggan_id" => $pelanggan -> id,
                    "no_rekening" => $no_rekening,
                    "kecamatan_id" => null,
                    "kelurahan_id" => null,
                    "area_id" => $area ? $area -> id : null,
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
}
