<?php

namespace App\Http\Controllers\API\Pelanggan;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use App\Models\PengaduanRiwayat;
use App\Models\Rekening;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PostPengaduanController extends Controller
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
            $user = auth('sanctum') -> user();
            $validation = Validator::make($request -> all(), [
                "keluhan" => "required"
            ]);

            if ($validation -> fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'format payload buruk',
                    'errors' => $validation->errors()
                ], 400);
            }

            if (!$request -> file('bukti_gambar')) {
                return response()->json([
                    'status' => false,
                    'message' => 'bukti tidak tersedia',
                ], 400);
            }

            $filename = $request -> file('bukti_gambar') -> store('public/pengaduan');
            $file = str_replace("public", "", 'storage'.$filename);
            $url = url($file);
            $data = [
                "pelanggan_id" => $user -> pelanggan -> id,
                "rekening_id" => $rekening -> id,
                "keluhan" => $request -> keluhan,
                "link_foto" => $url,
                "status" => 1,
                "petugas_id" => null,
                "keterangan_selesai" => null,
                "tgl_selesai" => null,
                "nilai" => null,
            ];

            $pengaduan = Pengaduan::create($data);
            $riwayat= [
                "pengaduan_id" => $pengaduan -> id,
                "created_by" => $user -> pelanggan -> id,
                "status" => $pengaduan -> status,
                "keterangan" => "Pengaduan diajukan"
            ];
            PengaduanRiwayat::create($riwayat);
            return response($pengaduan, 200);
        } catch(\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ], 500);
        }
    }
}
