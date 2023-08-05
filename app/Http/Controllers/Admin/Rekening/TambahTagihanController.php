<?php

namespace App\Http\Controllers\Admin\Rekening;

use App\Http\Controllers\Controller;
use App\Models\Pegawai;
use App\Models\Rekening;
use Illuminate\Http\Request;

class TambahTagihanController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Rekening $rekening)
    {
        $petugas = Pegawai::where('jabatan', 'Pembaca Meter') -> get();
        // return view('admin.tambahtagihan', [
        //     "petugas" => $petugas,
        //     "rekening" => $rekening
        // ]);
        return view('adminlte.tambahtagihan', [
            "petugas" => $petugas,
            "rekening" => $rekening
        ]);
    }
}
