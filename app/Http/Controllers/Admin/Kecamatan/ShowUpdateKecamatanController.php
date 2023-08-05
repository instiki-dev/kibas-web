<?php

namespace App\Http\Controllers\Admin\Kecamatan;

use App\Http\Controllers\Controller;
use App\Models\Kecamatan;
use Illuminate\Http\Request;

class ShowUpdateKecamatanController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Kecamatan $kecamatan)
    {
        // return view('admin.editkecamatan', ["kecamatan" => $kecamatan]);
        return view('adminlte.editkecamatan', ["kecamatan" => $kecamatan]);
    }
}
