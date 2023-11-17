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

            $tkn = $request -> device_token;

            if ($tkn != null) {
                $url = 'https://fcm.googleapis.com/fcm/send';
                $serverKey = env('SERVER_KEY');
                $token = [
                    $tkn
                ];
                $message = ["registration_ids" => $token];
                $message["notification"] = [
                    "title" => 'Pengaduan Baru',
                    "body" => 'Segera proses pengaduan dari pelanggan'
                ];

                $encodedData = json_encode($message);

                 $headers = [
                    'Authorization:key=' . $serverKey,
                    'Content-Type: application/json',
                ];

                $ch = curl_init();

                curl_setopt($ch, CURLOPT_URL, $url);
                curl_setopt($ch, CURLOPT_POST, true);
                curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
                curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
                // Disabling SSL Certificate
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch, CURLOPT_POSTFIELDS, $encodedData);

                  $result = curl_exec($ch);
                if ($result === FALSE) {
                    // die('Curl failed: ' . curl_error($ch));
                    curl_close($ch);
                }
                curl_close($ch);
            }

            return response($p, 200);
        } catch (Error $e) {
            return response()->json([
                'status' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
}
