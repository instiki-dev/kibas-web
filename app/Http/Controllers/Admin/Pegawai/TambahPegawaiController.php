<?php

namespace App\Http\Controllers\Admin\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\Pegawai;
use App\Models\Penugasan;
use App\Models\User;
use Illuminate\Http\Request;

class TambahPegawaiController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $validate = $request -> validate([
            "fullname" => "required",
            "name" => "required|unique:users",
            "email" => "required|email",
            "password" => "required|min:10",
            "area_id" => "required",
            "password2" => "required|same:password"
        ]);

        $password = bcrypt($validate["password"]);

        $user = [
            "name" => $validate["name"],
            "email" => $validate["email"],
            "password" => $password,
        ];


        $userData = User::create($user);

        $userData -> assignRole('Pembaca Meter');

        $readerData = [
            "user_id" => $userData -> id,
            "nama" => $validate["fullname"],
            "area_id" => (int)$validate["area_id"],
            "jabatan" => 'Pembaca Meter'
        ];
        $p = Pegawai::create($readerData);
        $penugasan = [
            "petugas_id" => $p -> id,
            "jumlah" => 0
        ];
        Penugasan::create($penugasan);
        return redirect() -> route('pegawai') -> with('successMessage', 'Pegawai berhasil ditambah');
    }
}
