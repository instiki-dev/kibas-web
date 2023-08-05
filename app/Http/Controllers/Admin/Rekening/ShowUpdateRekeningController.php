<?php

namespace App\Http\Controllers\Admin\Rekening;

use App\Http\Controllers\Controller;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Pelanggan;
use App\Models\Rekening;
use Illuminate\Http\Request;

class ShowUpdateRekeningController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Rekening $rekening)
    {
        $pelanggan = Pelanggan::all();
        $kecamatan = Kecamatan::all();
        $kelurahan = Kelurahan::all();

        // return view('admin.editrekening', [
        //     "data" => $rekening,
        //     "pelanggan" => $pelanggan,
        //     "kecamatan" => $kecamatan,
        //     "kelurahan" => $kelurahan,
        // ]);
        return view('adminlte.editrekening', [
            "data" => $rekening,
            "pelanggan" => $pelanggan,
            "kecamatan" => $kecamatan,
            "kelurahan" => $kelurahan,
        ]);
    }
}
