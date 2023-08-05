<?php

namespace App\Http\Controllers\Admin\Pelanggan;

use App\Http\Controllers\Controller;
use App\Models\Pelanggan;
use App\Models\User;
use Illuminate\Http\Request;

class UpdatePelangganController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Pelanggan $pelanggan)
    {
        $validate = $request -> validate([
            "fullname" => "required",
            "email" => "required|email",
            "nomor_pelanggan" => "required",
            "nik" => "required",
            "alamat_pelanggan" => "required",
            "golongan_id" => "required",
            "kecamatan_id" => "required",
            "kelurahan_id" => "required",
        ]);

        $user = [
            "email" => $validate["email"]
        ];

        User::where('id', $pelanggan -> user -> id) -> update($user);

        $pelangganData = [
            "no_pelanggan" => $validate["nomor_pelanggan"],
            "nama_pelanggan" => $validate["fullname"],
            "nik_pelanggan" => $validate["nik"],
            "alamat_pelanggan" => $validate["alamat_pelanggan"],
            "kecamatan_id" => $validate["kecamatan_id"],
            "kelurahan_id" => $validate["kelurahan_id"],
            "golongan_id" => $validate["golongan_id"],
        ];

        Pelanggan::where('id', $pelanggan -> id) -> update($pelangganData);
        return redirect() -> route('pelanggan') -> with("successMessage", "Berhasil merubah data");
    }
}
