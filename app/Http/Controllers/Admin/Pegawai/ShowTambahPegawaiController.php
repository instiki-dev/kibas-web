<?php

namespace App\Http\Controllers\Admin\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\Area;
use Illuminate\Http\Request;

class ShowTambahPegawaiController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        // return view('admin.tambahpegawai');
        $area = Area::all();
        return view('adminlte.tambahpegawai', ["area" => $area]);
    }
}
