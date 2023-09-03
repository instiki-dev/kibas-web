<?php

namespace App\Http\Controllers\Admin\Rekening;

use App\Http\Controllers\Controller;
use App\Models\Pegawai;
use App\Models\Pelanggan;
use App\Models\Rekening;
use App\Models\Tagihan;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Rap2hpoutre\FastExcel\FastExcel;

class ImportTagihanController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $xls = (new FastExcel()) -> import($request -> file('file'));


        $allData = [];

        foreach($xls as $item) {
            $noRekening = (string)$item["No Rekening"];
            $rekening = Rekening::where('no_rekening', $noRekening) -> first();
            $pelanggan = $rekening -> pelanggan;
            $pembaca = Pegawai::where('nama', $item["Pembaca"]) -> first();


            $data = [
                "no_tagihan" => $item["No Tagihan"],
                "pelanggan_id" => $pelanggan ? $pelanggan -> id : null,
                "rekening_id" => $rekening ? $rekening -> id : null,
                "bulan" => (int)$item["Bulan"],
                "tahun" => (int)$item["Tahun"],
                "pembaca_id" => $pembaca ? $pembaca -> id : null,
                "tgl_jatuh_tempo" => $item['Jatuh Tempo'],
                "status" => 0,
                "nominal" => $item["Nominal"],
                "kilometer" => $item["Kilometer"],
            ];

            Tagihan::create($data);

        }

        return redirect() -> route('tagihan') -> with('successMessage', 'Berhasil menambah tagihan');
    }
}
