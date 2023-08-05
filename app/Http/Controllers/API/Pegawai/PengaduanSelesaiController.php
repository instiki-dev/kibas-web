<?php

namespace App\Http\Controllers\API\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use App\Models\PengaduanRiwayat;
use Exception;
use Illuminate\Http\Request;

class PengaduanSelesaiController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Pengaduan $pengaduan)
    {
        //
        try {
            $pegawai = auth('sanctum') -> user() -> pegawai;
            if ($pengaduan -> petugas_id != $pegawai -> id) {
                return response([
                    "status" => false,
                    "message" => "Petugas ini bukan petugas yang bersangkutan"
                ], 401);
            }
            $data = [
                "status" => 4,
                "keterangan_selesai" => "Pengaduan telah diselesaikan oleh petugas (".$pegawai -> nama.") pada tanggal ".date("Y-m-d H:i:s"),
                "tgl_selesai" => date('Y-m-d H:i:s')
            ];
            Pengaduan::where('id', $pengaduan -> id) -> update($data);
            $riwayat = [
                "pengaduan_id" => $pengaduan -> id,
                "keterangan" => "Proses pengaduan telah diselesaikan oleh petugas",
                "status" => 4,
                "created_by" => $pengaduan -> pelanggan -> id,
            ];
            PengaduanRiwayat::create($riwayat);
            return response([
                "status" => true,
                "message" => "Berhasil mengubah status pengaduan menjadi 'selesai'"
            ], 200);
        } catch(Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
