<?php

namespace App\Http\Controllers\API\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use App\Models\Penugasan;
use Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PilihPegawaiController extends Controller
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
            $validator = Validator::make($request -> all(), [
                "pengaduan_id" => "required",
                "petugas_id" => "required"
            ]);

            if ($validator -> fails()) {
                return response([
                    'status' => false,
                    'message' => 'format payload buruk',
                    'errors' => $validator->errors()
                ], 400);
            }

            $pengaduan = Pengaduan::where([
                ['id', $request -> pengaduan_id],
                ['status', 1]
            ]);

            if (!$pengaduan -> first()) {
                return response([
                    'status' => false,
                    'message' => 'Pengaduan tidak ditemukan',
                    'errors' => $validator->errors()
                ], 404);
            }

            $data = [
                "petugas_id" => $request -> petugas_id,
                "status" => 2
            ];


            $pengaduan -> update($data);
            $jumlahPenugasan = $pengaduan -> penugasan -> jumlah;
            Penugasan::where('id', $pengaduan -> penugasan -> id)
                -> update(["jumlah" => $jumlahPenugasan + 1]);

            $p = Pengaduan::where('id', $request -> pengaduan_id)
                -> first();

            return response($p, 200);
        } catch (Error $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
