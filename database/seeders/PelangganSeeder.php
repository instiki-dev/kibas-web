<?php

namespace Database\Seeders;

use App\Models\Golongan;
use App\Models\Pegawai;
use App\Models\Pelanggan;
use App\Models\User;
use Illuminate\Database\Seeder;
use Rap2hpoutre\FastExcel\FastExcel;

class PelangganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

       $xls = (new FastExcel()) -> import('/home/freak_mei/Downloads/uas/pelanggan_data.xlsx');

        foreach($xls as $index=>$item) {
            // Create instance in table user
            $username = $item['username'];
            $password = $item['password'];
            $id = (string)$index;
            $password .= $id;
            $password = bcrypt($password);
            $user = [
                "name" => $username.$id,
                "email" => $username.$id."@gmail.com",
                "password" => $password
            ];
            $userData = User::create($user);
            $userData -> assignRole('Pelanggan');

            $golongan = Golongan::where('golongan', $item['golongan']) -> first() -> id;

            // Create instance in table pelanggan
            $pelangganData = [
                "user_id" => $userData -> id,
                "nama_pelanggan" => $item['nama_pelanggan'],
                "nik_pelanggan" => "",
                "no_pelanggan" => "",
                "alamat_pelanggan" => $item['alamat_pelanggan'],
                "golongan_id" => $golongan,
            ];
            Pelanggan::create($pelangganData);
        }


        // $usernameList = ["yogakrisna", "maulana"];
        // $emailList = ["yogakrisna@gmail.com", "maulana@gmail.com"];
        // $listPassword = ["yogakrisna12", "maulanaishaq"];
        // $listNama = ["Komang Yoga Krisna", "Maulana Ishaq"];
        // $noPelanggan = ["878787989", "8989898990"];
        // $nikPelanggan = ["78989899", "6743143443"];
        // $alamat = ["Renon", "Tabanan"];

        // for ($i = 0; $i < count($emailList); $i++) {
        //     $password = bcrypt($listPassword[$i]);
        //     $user = [
        //         "name" => $usernameList[$i],
        //         "email" => $emailList[$i],
        //         "password" => $password
        //     ];

        //     $userData = User::create($user);

        //     $userData -> assignRole('Pelanggan');

        //     $pelangganData = [
        //         "user_id" => $userData -> id,
        //         "nama_pelanggan" => $listNama[$i],
        //         "nik_pelanggan" => $nikPelanggan[$i],
        //         "no_pelanggan" => $noPelanggan[$i],
        //         "alamat_pelanggan" => $alamat[$i],
        //         "kecamatan_id" => 1,
        //         "kelurahan_id" => 1,
        //         "golongan_id" => 1,
        //     ];
        //     Pelanggan::create($pelangganData);
        // }

    }
}
