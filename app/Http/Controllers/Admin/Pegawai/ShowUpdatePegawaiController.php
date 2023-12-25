<?php

namespace App\Http\Controllers\Admin\Pegawai;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\Pegawai;
use Illuminate\Http\Request;

class ShowUpdatePegawaiController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Pegawai $pegawai)
    {
        // return view('admin.editpegawai', ["pegawai" => $pegawai]);
        $areaSelect = $pegawai -> areas -> pluck('area_id');
        $area = Area::all();
        return view('adminlte.editpegawai',
            [
                "pegawai" => $pegawai,
                "selectArea" => $areaSelect,
                "area" => $area
            ]
        );
    }
}
