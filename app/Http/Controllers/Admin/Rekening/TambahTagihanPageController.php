<?php

namespace App\Http\Controllers\Admin\Rekening;

use App\Http\Controllers\Controller;
use App\Models\Pegawai;
use App\Models\Rekening;
use Illuminate\Http\Request;

class TambahTagihanPageController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $pegawai = Pegawai::where('jabatan', 'Pembaca Meter') -> get();
        $rekening = Rekening::all();
        return view('adminlte.tambahtagihanpage', [
            'petugas' => $pegawai,
            "rekening" => $rekening
        ]);
    }
}
