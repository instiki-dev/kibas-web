<?php

namespace App\Http\Controllers\Admin\Kelurahan;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShowTambahKelurahanController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        // return view('admin.tambahkelurahan');
        return view('adminlte.tambahkelurahan');
    }
}
