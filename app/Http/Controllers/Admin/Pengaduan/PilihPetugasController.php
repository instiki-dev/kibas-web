<?php

namespace App\Http\Controllers\Admin\Pengaduan;

use App\Http\Controllers\Controller;
use App\Models\Pegawai;
use App\Models\Pengaduan;
use App\Models\PengaduanRiwayat;
use Illuminate\Http\Request;

class PilihPetugasController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Pengaduan $pengaduan, Pegawai $petugas)
    {
        $url = 'https://fcm.googleapis.com/fcm/send';
        $serverKey = env('SERVER_KEY');

        $data = [
            "petugas_id" => (int)$request -> petugas_id,
            "status" => 2
        ];

        $token = [$petugas -> user -> device_token];


        Pengaduan::where('id', $pengaduan -> id) -> update($data);

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
            return redirect() -> route('pengaduan') -> with('errorMessage', "Gagal memberikan notif kepada pelanggan");
        }
        curl_close($ch);

        $riwayat = [
            "pengaduan_id" => $pengaduan -> id,
            "keterangan" => "Pengaduan telah terkonfirmasi, mohon ditunggu",
            "status" => 2,
            "created_by" => $pengaduan -> pelanggan -> id,
        ];
        PengaduanRiwayat::create($riwayat);
        return redirect() -> route('pengaduan') -> with("successMessage", "Pengaduan telah terkonfirmasi");
    }
}
