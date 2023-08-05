<?php

namespace App\Http\Controllers\Admin\Area;

use App\Http\Controllers\Controller;
use App\Models\Kecamatan;
use Illuminate\Http\Request;

class ShowTambahAreaController extends Controller
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
        // return view("admin.tambaharea", ["data" => $kecamatan]);
        return view("adminlte.tambaharea", ["data" => $kecamatan]);
    }
}
