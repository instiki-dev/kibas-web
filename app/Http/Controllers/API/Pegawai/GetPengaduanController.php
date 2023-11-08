<?php

namespace App\Http\Controllers\API\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use App\Models\PengaduanRiwayat;
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
    public function __invoke(Request $request)
    {
        try {
            $pegawai = auth('sanctum') -> user() -> pegawai;
            $pengaduanList = Pengaduan::where('petugas_id', $pegawai -> id)
                    -> with('rekening:id,pelanggan_id')
                    -> with('pelanggan')
                    -> orderBy('status', 'ASC') -> get();
            $response = [];
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
                    "petugas" => $pegawai -> nama,
                    "pelanggan" => $pengaduan -> pelanggan -> nama_pelanggan,
                    "keterangan_selesai" => $pengaduan -> keterangan_selesai,
                    "tgl_selesai" => $pengaduan -> tgl_selesai,
                    "nilai" => $pengaduan -> nilai,
                    "tgl_lapor" => $pengaduan -> created_at,
                    "tgl_konfirmasi_pdam" => $riwayat -> created_at,
                ];

                array_push($response , $item);

            }
            return response($response, 200);
        } catch(Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
