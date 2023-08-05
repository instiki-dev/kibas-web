<?php

namespace App\Http\Controllers\API\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use App\Models\PengaduanRiwayat;
use Exception;
use Illuminate\Http\Request;

class ProsesPengaduanController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Pengaduan $pengaduan)
    {
        try {
            if ($pengaduan -> petugas_id != auth() -> user() -> pegawai -> id) {
                return response([
                    "status" => false,
                    "message" => "Petugas ini bukan petugas yang bersangkutan"
                ], 401);
            }
            $data = ["status" => 3];
            Pengaduan::where('id', $pengaduan -> id) -> update($data);
            $riwayat = [
                "pengaduan_id" => $pengaduan -> id,
                "keterangan" => "Pengaduan segera diproses petugas",
                "status" => 3,
                "created_by" => $pengaduan -> pelanggan -> id,
            ];
            PengaduanRiwayat::create($riwayat);
            return response([
                "status" => true,
                "message" => "Berhasil mengubah status pengaduan menjadi 'diproses'"
            ], 200);
        } catch(Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
