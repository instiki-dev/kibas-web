<?php

namespace App\Http\Controllers\Admin\Pelanggan;

use App\Http\Controllers\Controller;
use App\Models\Golongan;
use App\Models\Kecamatan;
use App\Models\Kelurahan;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class ShowUpdatePelangganController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Pelanggan $pelanggan)
    {
        $kecamatan = Kecamatan::all();
        $kelurahan = Kelurahan::all();
        $golongan = Golongan::all();
        // return view('admin.editpelanggan', [
        //     "pelanggan" => $pelanggan,
        //     "kecamatan" => $kecamatan,
        //     "kelurahan" => $kelurahan,
        //     "golongan" => $golongan,
        // ]);
        return view('adminlte.editpelanggan', [
            "pelanggan" => $pelanggan,
            "kecamatan" => $kecamatan,
            "kelurahan" => $kelurahan,
            "golongan" => $golongan,
        ]);
    }
}
