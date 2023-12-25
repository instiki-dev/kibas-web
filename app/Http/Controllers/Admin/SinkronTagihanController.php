<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Golongan;
use App\Models\Rekening;
use App\Models\Tagihan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SinkronTagihanController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $rekenings = Rekening::select('id', 'no_rekening', 'pelanggan_id') -> get();

        foreach ($rekenings as $rekening) {
            $data = Http::withHeaders([
                    'Authorization' => 'Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyIjoibGF5YW5hbnBlbCIsInBhc3MiOiIwMzhlM2U0YWQ3NDQ1M2E3MjE1M2ZiYmYzMmE2MDU3MyIsInRhbmdnYWwiOiIyMDIxLTAyLTA1IDEyOjQ3OjAwIn0.iSE4SGsAmnKh6E7tgf7rG4qjzYbmojY-jkhw0SFktmA',
                    'Accept' => 'application/json'
                ])
                ->get('https://apikabbangli.limasakti.co.id/api/loket-datatagihan/'.$rekening -> no_rekening);
            $data = json_decode($data);

            if ($data -> mssg == 'oke') {
                Tagihan::where('rekening_id', $rekening -> id)
                -> update(["status" => 1]);
                foreach($data -> data as $item) {
                    $periode = $item -> periode;
                    $bulan = substr($periode, -2, strlen($periode));
                    $tahun = substr($periode, 0, -2);
                    $tagihan = Tagihan::where([
                        ["rekening_id", $rekening -> id],
                        ["bulan", $bulan],
                        ["tahun", $tahun],
                        ["status", 0]
                    ])
                    -> first();

                    if (!$tagihan) {
                        $exist = Tagihan::where([
                            ["rekening_id", $rekening -> id],
                            ["bulan", $bulan],
                            ["tahun", $tahun]
                        ]);

                        if ($exist -> first()) {
                            $exist -> update(["status" => 0]);
                        } else {
                            $create = [
                                "no_tagihan" => $item -> tagihan,
                                "pelanggan_id" => $rekening -> pelanggan_id,
                                "rekening_id" => $rekening -> id,
                                "bulan" => $bulan,
                                "tahun" => $tahun,
                                "tgl_jatuh_tempo" => now(),
                                "status" => 0,
                                "nominal" => $item -> tagihan,
                                "kilometer" => $item -> pakai,
                                "denda" => $item -> denda
                            ];
                            Tagihan::create($create);
                        }
                    }
                }
            } else if($data -> mssg == "empty") {
                Tagihan::where('rekening_id', $rekening -> id)
                -> update(["status" => 1]);
            }

        }

        return redirect() -> route('tagihan') -> with('successMessage', 'Data tagihan berhasil disinkronkan');

    }
}
