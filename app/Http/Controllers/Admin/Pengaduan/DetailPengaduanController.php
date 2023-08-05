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
        $pegawai = Pegawai::where('jabatan', 'Pembaca Meter') -> get();
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
