<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\JenisPengumuman;
use App\Models\Pelanggan;
use App\Models\Rekening;
use Illuminate\Http\Request;

class PengumumanController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $jenis = JenisPengumuman::all();
        $area = Area::select('id', 'area') -> get();
        $rekening = Rekening::select('id', 'no_rekening') -> get();
        return view('adminlte.pengumuman', [
            "jenis" => $jenis,
            "area" => $area,
            "rekening" => $rekening
        ]);
    }
}
