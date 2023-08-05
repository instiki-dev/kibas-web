<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengaduan;
use App\Models\PengaduanRiwayat;
use App\Models\Rekening;
use Illuminate\Http\Request;

class RiwayatPengaduanController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Rekening $rekening)
    {
        $riwayat = [];
        if($rekening -> pengaduans) {
            if (count($rekening -> pengaduans) > 0) {
                $riwayat = PengaduanRiwayat::where('pengaduan_id', $rekening -> pengaduans[0] -> id);
                for ($i = 1; $i < count($rekening -> pengaduans); $i++) {
                    $riwayat -> orWhere('pengaduan_id', $rekening -> pengaduans[$i] -> id);
                }
                $riwayat -> orderBy('created_at', 'DESC');
                $riwayat = $riwayat -> get();
            }
        }
        // return view('admin.riwayatpengaduan', ["data" => $riwayat, "rekening" => $rekening]);
        return view('adminlte.riwayatpengaduan', ["data" => $riwayat, "rekening" => $rekening]);
    }
}
