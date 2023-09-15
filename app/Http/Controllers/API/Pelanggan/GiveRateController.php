<?php

namespace App\Http\Controllers\API\Pelanggan;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use App\Models\Rekening;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GiveRateController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Rekening $rekening, Pengaduan $pengaduan)
    {
        try {

            if ($rekening -> id != $pengaduan -> rekening_id) {
                return response([
                    "status" => false,
                    "message" => "Pengaduan tidak tersedia"
                ], 400);
            }

            $validation = Validator::make($request -> all(), [
                "nilai" => "required|lt:6"
            ]);

            if ($validation -> fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'data pada payload tidak sesuai',
                    'errors' => $validation->errors()
                ], 400);
            }

            $data = [
                "nilai" => $request -> nilai,
                "rate" => true
            ];

            Pengaduan::where("id", $pengaduan -> id) -> update($data);
            return response(
                [
                    "status" => true,
                    "message" => "Nilai berhasil diperbarui"
                ], 200
            );
        } catch(Exception $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
