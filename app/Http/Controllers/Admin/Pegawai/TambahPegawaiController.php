<?php

namespace App\Http\Controllers\Admin\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\Pegawai;
use App\Models\PegawaiArea;
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
            "email" => "required|email|unique:users",
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

        $areas = array_map('intVal', $validate["area_id"]);


        $userData = User::create($user);

        $userData -> assignRole('Pembaca Meter');

        $readerData = [
            "user_id" => $userData -> id,
            "nama" => $validate["fullname"],
            "area_id" => $areas[0],
            "jabatan" => 'Pembaca Meter'
        ];
        $p = Pegawai::create($readerData);
        $penugasan = [
            "petugas_id" => $p -> id,
            "jumlah" => 0
        ];
        Penugasan::create($penugasan);

        foreach ($areas as $area) {
            $pegArea = [
                "area_id" => $area,
                "pegawai_id" => $p -> id
            ];

            PegawaiArea::create($pegArea);
        }
        return redirect() -> route('pegawai') -> with('successMessage', 'Pegawai berhasil ditambah');
    }
}
