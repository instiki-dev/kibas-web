<?php

namespace App\Http\Controllers\Admin\RiwayatPengaduan;

use App\Http\Controllers\Controller;
use App\Models\PengaduanRiwayat;
use App\Models\Rekening;
use Illuminate\Http\Request;

class DetailRiwayatController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, PengaduanRiwayat $riwayat)
    {
        $pengaduan = $riwayat -> pengaduan;
        $rekening = $pengaduan -> rekening;
        // return view('admin.detailriwayat', [
        //     "pengaduan" => $pengaduan,
        //     "rekening" => $rekening,
        //     "riwayat" => $riwayat
        // ]);
        return view('adminlte.detailriwayat', [
            "pengaduan" => $pengaduan,
            "rekening" => $rekening,
            "riwayat" => $riwayat
        ]);
    }
}
