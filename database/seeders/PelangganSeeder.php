<?php

namespace Database\Seeders;

use App\Models\Pegawai;
use App\Models\Pelanggan;
use App\Models\User;
use Illuminate\Database\Seeder;

class PelangganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usernameList = ["yogakrisna", "maulana"];
        $emailList = ["yogakrisna@gmail.com", "maulana@gmail.com"];
        $listPassword = ["yogakrisna12", "maulanaishaq"];
        $listNama = ["Komang Yoga Krisna", "Maulana Ishaq"];
        $noPelanggan = ["878787989", "8989898990"];
        $nikPelanggan = ["78989899", "6743143443"];
        $alamat = ["Renon", "Tabanan"];

        for ($i = 0; $i < count($emailList); $i++) {
            $password = bcrypt($listPassword[$i]);
            $user = [
                "name" => $usernameList[$i],
                "email" => $emailList[$i],
                "password" => $password
            ];

            $userData = User::create($user);

            $userData -> assignRole('Pelanggan');

            $pelangganData = [
                "user_id" => $userData -> id,
                "nama_pelanggan" => $listNama[$i],
                "nik_pelanggan" => $nikPelanggan[$i],
                "no_pelanggan" => $noPelanggan[$i],
                "alamat_pelanggan" => $alamat[$i],
                "kecamatan_id" => 1,
                "kelurahan_id" => 1,
                "golongan_id" => 1,
            ];
            Pelanggan::create($pelangganData);
        }

    }
}
