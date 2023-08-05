<?php

namespace Database\Seeders;

use App\Models\Pegawai;
use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $password = bcrypt("root123");
        $user = [
            "name" => "root",
            "email" => "testing@gmail.com",
            "password" => $password
        ];

        $userData = User::create($user);

        $userData -> assignRole('Admin');

        $adminData = [
            "user_id" => $userData -> id,
            "nama" => "root",
            "jabatan" => 'Admin'
        ];
        Pegawai::create($adminData);
    }
}
