<?php

namespace App\Http\Controllers\Admin\Rekening;

use App\Http\Controllers\Controller;
use App\Models\Golongan;
use App\Models\Pelanggan;
use App\Models\Rayon;
use App\Models\Rekening;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SinkronRekeningController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $validation = $request -> validate([
            "golongan" => "required",
            "rayon" => "required"
        ]);

        $data = Http::withHeaders([
                'Authorization' => 'Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJ1c2VyIjoibGF5YW5hbnBlbCIsInBhc3MiOiIwMzhlM2U0YWQ3NDQ1M2E3MjE1M2ZiYmYzMmE2MDU3MyIsInRhbmdnYWwiOiIyMDIxLTAyLTA1IDEyOjQ3OjAwIn0.iSE4SGsAmnKh6E7tgf7rG4qjzYbmojY-jkhw0SFktmA',
                'Accept' => 'application/json'
            ])
            ->get('https://apikabbangli.limasakti.co.id/api/layanan-datapelanggan/'.$validation["golongan"].'/'.$validation["rayon"]);

        $dt = json_decode($data);

        $gol = Golongan::where('golongan', $validation["golongan"]) -> first();
        $rayon = Rayon::where('kode_rayon', $validation['rayon']) -> first();

        if ($dt -> mssg == "oke") {
            foreach ($dt -> data as $index=>$item) {
                if (!Rekening::where('no_rekening', $item -> nosamb) -> first()) {
                    $pelanggan = null;
                    if (!Pelanggan::where([
                        ["nama_pelanggan", $item -> pelanggan],
                    ]) -> first()) {
                        // Create instance in table user
                        $username = $item -> pelanggan;
                        $username = str_replace(" ", "", $username);
                        $username = strtolower($username);
                        $id = (string)$index;
                        $password = bcrypt($username);
                        $user = [
                            "name" => $username,
                            "email" => $username.$id."@gmail.com",
                            "password" => $password
                        ];
                        $userData = User::create($user);
                        $userData -> assignRole('Pelanggan');

                        $golongan = Golongan::where('golongan', $item['golongan']) -> first() -> id;

                        // Create instance in table pelanggan
                        $pelangganData = [
                            "user_id" => $userData -> id,
                            "nama_pelanggan" => $item['username'],
                            "nik_pelanggan" => "",
                            "no_pelanggan" => "",
                            "alamat_pelanggan" => $item['alamat'],
                            "golongan_id" => $golongan,
                        ];
                        $pelanggan = Pelanggan::create($pelangganData);
                    }
                    $value = [
                        "pelanggan_id" => $pelanggan -> id,
                        "no_rekening" => $item -> nosamb,
                        "kecamatan_id" => null,
                        "kelurahan_id" => null,
                        "area_id" => null,
                        "lat" => "-8.4639394",
                        "lng" => "115.3497947",
                        "golongan_id" => $gol -> id,
                        "rayon_id" => $rayon -> id,
                        "register" => 0
                    ];
                    Rekening::create($value);
                }
            }

        }
        return redirect() -> route('rekening') -> with('successMessage', 'Data dengan kode rayon '.$validation["rayon"].' dan golongan '.$validation["golongan"].' berhasil disinkronkan');
    }
}
