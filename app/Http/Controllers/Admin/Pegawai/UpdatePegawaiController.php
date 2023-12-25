<?php

namespace App\Http\Controllers\Admin\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\Pegawai;
use App\Models\PegawaiArea;
use App\Models\User;
use Illuminate\Http\Request;

class UpdatePegawaiController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Pegawai $pegawai)
    {
        $validate = $request -> validate([
            "fullname" => "required",
            "email" => "required|email"
        ]);
        $userData = [
                "email" => $validate["email"],
        ];

        $areas = array_map('intVal', $request -> area_id);

        User::where('id', $pegawai -> user -> id) -> update($userData);
        PegawaiArea::where('pegawai_id', $pegawai -> id) -> delete();

        foreach ($areas as $area) {
            $dt = [
                "area_id" => $area,
                "pegawai_id" => $pegawai -> id
            ];
            PegawaiArea::create($dt);
        }

        $pegawaiData = ["nama" => $validate["fullname"]];
        Pegawai::where('id', $pegawai -> id) -> update($pegawaiData);
        return redirect() -> route('pegawai') -> with('successMessage', "Berhasil merubah data");
    }
}
