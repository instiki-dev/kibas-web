<?php

namespace App\Http\Controllers\Admin\Rekening;

use App\Http\Controllers\Controller;
use App\Models\Rekening;
use App\Models\Tagihan;
use Illuminate\Http\Request;

class RekeningTagihanController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Rekening $rekening)
    {
        $tagihan = Tagihan::where('rekening_id', $rekening -> id) -> get();
        // return view("admin.rekeningtagihan", [
        //     "data" => $tagihan,
        //     "rekening" => $rekening
        // ]);
        return view("adminlte.rekeningtagihan", [
            "data" => $tagihan,
            "rekening" => $rekening
        ]);
    }
}
