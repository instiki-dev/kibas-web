<?php

namespace App\Http\Controllers\Admin\Pengaduan;

use App\Http\Controllers\Controller;
use App\Models\Pegawai;
use App\Models\Pengaduan;
use App\Models\PengaduanRiwayat;
use Illuminate\Http\Request;

class PilihPetugasController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Pengaduan $pengaduan, Pegawai $petugas)
    {
        $data = [
            "petugas_id" => (int)$request -> petugas_id,
            "status" => 2
        ];
        Pengaduan::where('id', $pengaduan -> id) -> update($data);
        $riwayat = [
            "pengaduan_id" => $pengaduan -> id,
            "keterangan" => "Pengaduan telah terkonfirmasi, mohon ditunggu",
            "status" => 2,
            "created_by" => $pengaduan -> pelanggan -> id,
        ];
        PengaduanRiwayat::create($riwayat);
        return redirect() -> route('pengaduan') -> with("successMessage", "Pengaduan telah terkonfirmasi");
    }
}
