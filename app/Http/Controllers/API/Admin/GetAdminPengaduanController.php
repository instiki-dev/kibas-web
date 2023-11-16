<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use App\Models\PengaduanRiwayat;
use Error;
use Illuminate\Http\Request;

class GetAdminPengaduanController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request) {
        try {
            $pengaduan = Pengaduan::orderBy('status', 'ASC')
                -> with(['pelanggan:id,nama_pelanggan', 'rekening', 'petugas:id,nama'])
                -> paginate(10);

            $response = [];

            foreach ($pengaduan as $pengaduan) {
                $riwayat = PengaduanRiwayat::where([
                        ["pengaduan_id", $pengaduan ->id],
                        ["keterangan", "Pengaduan telah terkonfirmasi, mohon ditunggu"],
                    ]) -> first();

                $item = [
                    "id" => $pengaduan -> id,
                    "pelanggan" => $pengaduan -> pelanggan ? $pengaduan -> pelanggan -> nama_pelanggan : "-",
                    "rekening" => $pengaduan -> rekening,
                    "keluhan" => $pengaduan -> keluhan,
                    "link_foto" => $pengaduan -> link_foto,
                    "status" => $pengaduan -> status,
                    "petugas" => $pengaduan -> petugas ? $pengaduan -> petugas -> nama : "-",
                    "rate" => $pengaduan -> rate,
                    "keterangan_selesai" => $pengaduan -> keterangan_selesai,
                    "tgl_selesai" => $pengaduan -> tgl_selesai,
                    "nilai" => $pengaduan -> nilai,
                    "tgl_lapor" => $pengaduan -> created_at,
                    "tgl_konfirmasi_pdam" => $riwayat ? $riwayat -> created_at : "-",
                ];

                array_push($payload, $item);

            }
            return response($response, 200);
        } catch(Error $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
