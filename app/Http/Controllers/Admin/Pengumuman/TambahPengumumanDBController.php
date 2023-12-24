<?php

namespace App\Http\Controllers\Admin\Pengumuman;

use App\Http\Controllers\Controller;
use App\Models\Berita;
use App\Models\PengumumanDetail;
use App\Models\PengumumanMaster;
use App\Models\Rekening;
use Illuminate\Http\Request;



class TambahPengumumanDBController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $url = 'https://fcm.googleapis.com/fcm/send';
        $serverKey = env('SERVER_KEY');

        $validation = [
            "jenis" => "required",
            "berita" => "required"
        ];

        $urlImage = '';

        if ($request -> jenis == 5) {
            $validation["judul"] = "required";
            $validation["penulis"] = "required";

            if (!$request -> file('foto')) {
                return redirect() -> route('dashboard') -> with('errorMessage', "Gagal memberikan notif kepada pelanggan");
            }
            $filename = $request -> file('foto') -> store('public/pengaduan');
            $file = str_replace("public", "", 'storage'.$filename);
            $urlImage = url($file);
        }

        if((int)$request -> jenis < 3) {

            $validation["pelanggan_id"] = "required|array|min:1";
        } else if((int)$request -> jenis != 5) {
            $validation["area_id"] = "required|array|min:1";
        }
        $validate = $request -> validate($validation);
        $data = [
            "pengumuman" => $validate["berita"],
            "jenis_id" => $validate["jenis"]
        ];
        if($validate["jenis"] < 3) {
            $data["area_id"] = null;
            $intArray = array_map('intVal', $validate["pelanggan_id"]);
            $master = PengumumanMaster::create($data);
            foreach($intArray as $item) {
                $detail = [
                    "master_id" => $master -> id,
                    "rekening_id" => $item
                ];
                PengumumanDetail::create($detail);
            }
            $deviceToken = Rekening::whereIn('id', $intArray) -> whereNotNull('device_token') -> pluck('device_token');
        } else if($validate["jenis"] == 5) {
            $data["judul"] = $validate["judul"];
            $data["penulis"] = $validate["penulis"];
            $data["link_foto"] = $urlImage;
             $master = PengumumanMaster::create($data);
             $deviceToken = Rekening::whereNotNull('device_token') -> pluck('device_token');
        } else {
            $intArr = array_map('intVal', $validate["area_id"]);
            foreach($intArr as $item) {
                $data["area_id"] = $item;
                $master = PengumumanMaster::create($data);
            }
            $deviceToken = Rekening::whereIn('area_id', $intArr) -> whereNotNull('device_token') -> pluck('device_token');
        }

        switch((int)$validate["jenis"]) {
            case 1 :
                $title = "Peringatan Pencabutan Rekening";
                $judul = "Peringatan Pencabutan Rekening";
                break;
            case 2 :
                $title = "Peringatan Penyegelan Rekening";
                $judul = "Peringatan Penyegelan Rekening";
                break;
            case 3 :
                $title = "Periode Pembayaran";
                $judul = "Periode Pembayaran";

                break;
            case 5 :
                $title = 'Bangli Terkini';
                $judul = 'Bangli Terkini';
                break;
            default :
                $title = "Pengumuman KIBAS";
                $judul = "Pengumuman KIBAS";

        }

        $token = ['c-C5F3eX1PlSMY8vF20KZ3:APA91bHdZwp_1kcprdYPk2JQvClfYufjXtQULVCV8dA5mymnES1tNVYqkCcVISJ8Zb5zg0iRgyjJe8IvXIPzwzNIdKAs4SptgxFw6jIo6xZOS1szyhQL-s0DjpORmnSyoDHvkxoXMk7F'];

        $message = ["registration_ids" => $deviceToken];
        // $message = ["registration_ids" => $token];
        $message["notification"] = [
            "title" => $title,
            "body" => $judul
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
            return redirect() -> route('dashboard') -> with('errorMessage', "Gagal memberikan notif kepada pelanggan");
        }
        // Close connection
        curl_close($ch);

        // dd($result);

        return redirect() -> route('pengumuman') -> with('successMessage', "Berita telah ditambahkan");
    }
}
