<?php

namespace App\Http\Controllers\Admin\Pelanggan;

use App\Http\Controllers\Controller;
use App\Models\Golongan;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use Illuminate\Http\Request;

class TampilanController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $kecamatan = Kecamatan::all();
        $kelurahan = Kelurahan::all();
        $golongan = Golongan::all();
        // return view('admin.tambahpelanggan', [
        //     "golongan" => $golongan,
        //     "kecamatan" => $kecamatan,
        //     "kelurahan" => $kelurahan
        // ]);
        return view('adminlte.tambahpelanggan', [
            "golongan" => $golongan,
            "kecamatan" => $kecamatan,
            "kelurahan" => $kelurahan
        ]);
    }
}
