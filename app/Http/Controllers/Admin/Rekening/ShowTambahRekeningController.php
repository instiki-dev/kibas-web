<?php

namespace App\Http\Controllers\Admin\Rekening;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Pelanggan;
use App\Models\Rekening;
use Illuminate\Http\Request;

class ShowTambahRekeningController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        //
        $pelanggan = Pelanggan::all();
        $kecamatan = Kecamatan::all();
        $kelurahan = Kelurahan::all();
        $area = Area::all();
        // return view('admin.tambahrekening', [
        //     "pelanggan" => $pelanggan,
        //     "kecamatan" => $kecamatan,
        //     "kelurahan" => $kelurahan
        // ]);
        return view('adminlte.tambahrekening', [
            "pelanggan" => $pelanggan,
            "kecamatan" => $kecamatan,
            "kelurahan" => $kelurahan,
            "area" => $area
        ]);
    }
}
