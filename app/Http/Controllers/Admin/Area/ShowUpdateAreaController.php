<?php

namespace App\Http\Controllers\Admin\Area;

use App\Http\Controllers\Controller;
use App\Models\Area;
use App\Models\Kecamatan;
use Illuminate\Http\Request;

class ShowUpdateAreaController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Area $area)
    {
        $kecamatan = Kecamatan::all();
        // return view('admin.editarea',
        //     ["area" => $area, "kecamatan" => $kecamatan]);
        return view('adminlte.editarea',
            ["area" => $area, "kecamatan" => $kecamatan]);
    }
}
