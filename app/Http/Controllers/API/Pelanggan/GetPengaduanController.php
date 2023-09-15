<?php

namespace App\Http\Controllers\API\Pelanggan;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use App\Models\PengaduanRiwayat;
use App\Models\Rekening;
use Exception;
use Illuminate\Http\Request;

class GetPengaduanController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Rekening $rekening)
    {
        try {
            $pengaduanList = Pengaduan::where([
                ["rekening_id", $rekening -> id],
            ]) -> get();

            $payload = [];

            foreach ($pengaduanList as $pengaduan) {
                $riwayat = PengaduanRiwayat::where([
                        ["pengaduan_id", $pengaduan ->id],
                        ["keterangan", "Pengaduan telah terkonfirmasi, mohon ditunggu"],
                    ]) -> first();

                $item = [
                    "id" => $pengaduan -> id,
                    "pelanggan" => $pengaduan -> pelanggan,
                    "rekening" => $pengaduan -> rekening,
                    "keluhan" => $pengaduan -> keluhan,
                    "link_foto" => $pengaduan -> link_foto,
                    "status" => $pengaduan -> status,
                    "petugas" => $pengaduan -> petugas,
                    "rate" => $pengaduan -> rate,
                    "keterangan_selesai" => $pengaduan -> keterangan_selesai,
                    "tgl_selesai" => $pengaduan -> tgl_selesai,
                    "nilai" => $pengaduan -> nilai,
                    "tgl_lapor" => $pengaduan -> created_at,
                    "tgl_konfirmasi_pdam" => $riwayat ? $riwayat -> created_at : "-",
                ];

                array_push($payload, $item);

            }


            return response($payload, 200);
        } catch(Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e -> getMessage()
            ], 500);
        }
    }
}
