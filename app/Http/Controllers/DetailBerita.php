<?php

namespace App\Http\Controllers;

use App\Models\PengumumanMaster;
use Illuminate\Http\Request;

class DetailBerita extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, PengumumanMaster $berita)
    {
        return view('adminlte.berita', ['berita' => $berita]);

    }
}
