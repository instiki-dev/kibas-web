<?php

namespace App\Http\Controllers\Admin\Rekening;

use App\Http\Controllers\Controller;
use App\Models\Tagihan;
use Illuminate\Http\Request;

class DetailTagihanController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Tagihan $tagihan)
    {
         $bulan = date("F", mktime(0, 0, 0, $tagihan -> bulan, 10));
        // return view('admin.detailtagihan', [
        //     "tagihan" => $tagihan,
        //     "bulan" => $bulan
        // ]);
        return view('adminlte.detailtagihan', [
            "tagihan" => $tagihan,
            "bulan" => $bulan
        ]);
    }
}
