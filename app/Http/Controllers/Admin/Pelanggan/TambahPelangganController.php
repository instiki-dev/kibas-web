<?php

namespace App\Http\Controllers\Admin\Pelanggan;

use App\Http\Controllers\Controller;
use App\Models\Pelanggan;
use App\Models\User;
use Illuminate\Http\Request;

class TambahPelangganController extends Controller
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
            "password" => "required|min:8",
            "password2" => "required|same:password",
            "nomor_pelanggan" => "required",
            "nik" => "required",
            "alamat_pelanggan" => "required",
            "golongan_id" => "required",
            "kecamatan_id" => "required",
            "kelurahan_id" => "required",
        ]);

        $password = bcrypt($validate["password"]);

        $user = [
            "name" => $validate["name"],
            "email" => $validate["email"],
            "password" => $password,
        ];

        $userData = User::create($user);

        $userData -> assignRole('Pelanggan');

        $pelangganData = [
            "user_id" => $userData -> id,
            "no_pelanggan" => $validate["nomor_pelanggan"],
            "nama_pelanggan" => $validate["fullname"],
            "nik_pelanggan" => $validate["nik"],
            "alamat_pelanggan" => $validate["alamat_pelanggan"],
            "kecamatan_id" => $validate["kecamatan_id"],
            "kelurahan_id" => $validate["kelurahan_id"],
            "golongan_id" => $validate["golongan_id"],
        ];

        Pelanggan::create($pelangganData);
        return redirect() -> route('pelanggan') -> with("successMessage", "Berhasil menambah pelanggan");
    }
}
