<?php

namespace App\Http\Controllers\Admin\Pengaduan;

use App\Http\Controllers\Controller;
use App\Models\Pegawai;
use App\Models\Pengaduan;
use Illuminate\Http\Request;

class DetailPengaduanController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Pengaduan $pengaduan)
    {
        $area = $pengaduan -> rekening -> area;
        if (!$area) {
            $pegawai = Pegawai::where('jabatan', 'Pembaca Meter') -> get();
        } else {
            $pegs = $area -> pegawais;
            // $pegawai = Pegawai::where([
            //     ['jabatan', 'Pembaca Meter'],
            //     ['area_id', $area -> id]
            // ]) -> get();
            //

            $pegawai = Pegawai::whereIn('id', $pegs) -> get();
        }


        if (count($pegawai) == 0) {
            $pegawai = Pegawai::where('jabatan', 'Pembaca Meter') -> get();
        }

        // return view('admin.detailpengaduan', [
        //     "pengaduan" => $pengaduan,
        //     "pegawai" => $pegawai
        // ]);
        return view('adminlte.detailpengaduan', [
            "pengaduan" => $pengaduan,
            "pegawai" => $pegawai
        ]);
    }
}
