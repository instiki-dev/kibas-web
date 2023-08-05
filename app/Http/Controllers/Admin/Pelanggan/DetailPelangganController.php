<?php

namespace App\Http\Controllers\Admin\Pelanggan;

use App\Http\Controllers\Controller;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class DetailPelangganController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request, Pelanggan $pelanggan)
    {
        // return view('admin.detailpelanggan', ["pelanggan" => $pelanggan]);
        return view('adminlte.detailpelanggan', ["pelanggan" => $pelanggan]);
    }
}
