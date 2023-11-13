<?php

namespace App\Http\Controllers\API\Pelanggan;

use App\Http\Controllers\Controller;
use App\Models\Rekening;
use App\Models\Tagihan;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GetTagihanController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function getTagihan(String $noRekening) {
        return Http::withHeaders([
                'Authorization' => 'Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyIjoibGF5YW5hbnBlbCIsInBhc3MiOiIwMzhlM2U0YWQ3NDQ1M2E3MjE1M2ZiYmYzMmE2MDU3MyIsInRhbmdnYWwiOiIyMDIxLTAyLTA1IDEyOjQ3OjAwIn0.iSE4SGsAmnKh6E7tgf7rG4qjzYbmojY-jkhw0SFktmA',
                'Accept' => 'application/json'
            ])
            ->get('https://apikabbangli.limasakti.co.id/api/loket-datatagihan/'.$noRekening);
    }

    public function __invoke(Request $request, Rekening $rekening)
    {
        try {
            $dt = $this -> getTagihan($rekening -> no_rekening);
            $data = json_decode($dt);
            if ($data -> mssg == 'oke') {
                Tagihan::where('rekening_id', $rekening -> id)
                -> update(["status" => 1]);
                foreach($data -> data as $item) {
                    $periode = $data -> periode;
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
                                "pelanggan_id" => $rekening -> pelanggan -> id,
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

            if ($request -> query('dashboard')) {
                $tagihan = Tagihan::where([
                    ['rekening_id', $rekening -> id],
                    ['status', 0]
                ]) -> paginate(3);
                return response($tagihan, 200);
            }
            $tagihan = Tagihan::where('rekening_id', $rekening ->id) -> paginate();
            return response($tagihan, 200);
        } catch(Exception $e) {
            return response([
                "status" => false,
                "message" => $e -> getMessage()
            ], 200);
        }
    }
}
