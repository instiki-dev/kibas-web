<?php

namespace Database\Seeders;

use App\Models\Pegawai;
use App\Models\User;
use Illuminate\Database\Seeder;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $usernameList = ["madelelut", "pandeucok"];
        $emailList = ["madelelut@gmail.com", "pandeucok@gmail.com"];
        $listPassword = ["madelelut", "nyomanpandeucok"];
        $listNama = ["Made Lelut", "Nyoman Pande Sukma Pradnyana"];

        for ($i = 0; $i < count($emailList); $i++) {
            $password = bcrypt($listPassword[$i]);
            $user = [
                "name" => $usernameList[$i],
                "email" => $emailList[$i],
                "password" => $password
            ];

            $userData = User::create($user);

            $userData -> assignRole('Pembaca Meter');

            $pegawaiData = [
                "user_id" => $userData -> id,
                "nama" => $listNama[$i],
                "jabatan" => 'Pembaca Meter'
            ];
            Pegawai::create($pegawaiData);
        }

    }
}
