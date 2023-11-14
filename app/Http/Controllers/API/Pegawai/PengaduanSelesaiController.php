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

            $tkn = $pengaduan -> rekening -> device_token;

            if ($tkn) {
                $url = 'https://fcm.googleapis.com/fcm/send';
                $serverKey = env('SERVER_KEY');
                $token = [
                    $tkn
                ];
                $message = ["registration_ids" => $token];
                $message["notification"] = [
                    "title" => 'Pengaduan Selesai',
                    "body" => 'Pengaduan anda telah diselesaikan oleh petugas, mohon untuk memberikan penilaian pada penanganan pengaduan anda'
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
