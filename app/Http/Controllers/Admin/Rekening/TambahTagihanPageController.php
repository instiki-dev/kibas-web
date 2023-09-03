<?php

namespace App\Http\Controllers\Admin\Rekening;

use App\Http\Controllers\Controller;
use App\Models\Pegawai;
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
        return view('adminlte.tambahtagihanpage', ['petugas' => $pegawai]);
    }
}
